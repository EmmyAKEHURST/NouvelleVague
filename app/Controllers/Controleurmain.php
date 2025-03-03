<?php

namespace App\Controllers;

class Controleurmain extends BaseController
{   
    //------------------------------------------------------------------------------------LES PAGES------------------------------------------------------------------------------------
    //PAGE D'ACCUEIL
    public function index($action = 'index') {
        $monmodel = new \App\Models\Monmodele();
        $data = [
            'tempsforts' => $monmodel->getTempsForts()
        ];
        return view('menu').view('accueilheader').view('accueilinfo', $data).view('footer');
    }
    
    //PAGE D'INSCRIPTION
    public function pgInscription($action = 'pgInscription') {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('header').view('inscription').view('footer');
    }

    //PAGE DE CONNEXION
    public function pgConnexion($action = 'pgConnexion') {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('header').view('connexion').view('footer');
    }

    // PAGE DE PROFIL
    public function pgProfil($action = 'pgProfil') {
        $session = session();
        // Vérifie si l'utilisateur est connecté
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/pgConnexion')->with('error', 'Veuillez vous connecter.');
        }   
        // Récupérer l'utilisateur connecté depuis la session
        $monmodel = new \App\Models\Monmodele();
        $user = $monmodel->getUserById($session->get('id'));     
        // Passer l'utilisateur à la vue
        return view('menu').view('header').view('profil', ['user' => $user]) // Passer le id a le vue profil
            .view('footer');
    }

    // PAGE MODIFICATION DU PROFIL
    public function profilModifier($action = 'profilModifier') {
        $session = session();
        // Vérifie si l'utilisateur est connecté
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/pgConnexion')->with('error', 'Veuillez vous connecter.');
        }
        // Récupérer l'utilisateur connecté depuis la session
        $monmodel = new \App\Models\Monmodele();
        $user = $monmodel->getUserById($session->get('id'));
        // Passer l'utilisateur à la vue
        return view('menu').view('header').view('profilModifier', ['user' => $user])
            .view('footer');
    }

    // PAGE CONSULTATIONS TEMPS FORTS
    public function tempsForts($action = 'tempsForts') {
        $monmodel = new \App\Models\Monmodele();
        $data = [
            'tempsforts' => $monmodel->getTempsForts()
        ];
        return view('menu').view('header').view('tempsForts', $data).view('footer');
    }

    // PAGE INSCRIPTION TEMPS FORT
    public function tempsFortsInscription($action = 'tempsFortsInscription') {
        $monmodel = new \App\Models\Monmodele();
        $id = $this->request->getPost('id');
        $libelle = $this->request->getPost('libelle');
        return view('menu').view('header').view('tempsFortsInscription', ['id' => $id, 'libelle' => $libelle]).view('footer');
    }


    //------------------------------------------------------------------------------------LES FONCTIONS------------------------------------------------------------------------------------
    public function inscription() {
        $monmodel = new \App\Models\Monmodele();
        $rules = [
            'prenom' => 'required|max_length[50]',
            'nom' => 'required|max_length[50]',
            'login' => 'required|max_length[50]',
            'mail' => 'required|valid_email',
            'motdepasse' => [
                'rules' => 'required|min_length[12]|regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W]).+$/]',
                'errors' => [
                    'regex_match' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial, et faire au minimum 12 caractères.',
                ]
            ],
            'validermotdepasse' => [
                'rules' => 'required|matches[motdepasse]',
                'errors' => [
                    'matches' => 'Les mots de passe ne correspondent pas.'
                ]
            ]
        ];        
        if ($this->validate($rules)) {
            if($monmodel->verifmail($this->request->getPost()) == 0){
                $monmodel->inscriptionValider($this->request->getPost());
                return redirect()->to('/pgInscription')->with('success', 'Compte créé avec succès.');
            }
            else{
                return redirect()->to('/pgInscription')->with('danger', 'Mail déjà utilisé.');
            }
        } else {
            return view('menu').view('header').view('inscription').view('footer', ['errors' => $this->validator->getErrors()]);
        }
    }

    public function connexion() {
        $monmodel = new \App\Models\Monmodele();
        $rules = [
            'login' => 'required',
            'motdepasse' => 'required'
        ];
    
        if ($this->validate($rules)) {
            $user = $monmodel->getUserByLogin($this->request->getPost('login'));
    
            if ($user && password_verify($this->request->getPost('motdepasse'), $user->mdp)) {
                $session = session();
                $session->set([
                    'id' => $user->id,
                    'nom' => $user->nom,
                    'prenom' => $user->prenom,
                    'login' => $user->login,
                    'mail' => $user->mail,
                    'role' => $user->role,
                    'isLoggedIn' => true
                ]);
    
                // Redirection vers la page d'accueil après connexion
                return redirect()->to('/')->with('success', 'Connexion réussie !');
            } else {
                return view('menu')
                    .view('header')
                    .view('connexion', ['errors' => ['login' => 'Login ou mot de passe incorrect.']])
                    .view('footer');
            }
        } else {
            return view('menu')
                .view('header')
                .view('connexion', ['errors' => $this->validator->getErrors()])
                .view('footer');
        }
    }

    public function deconnexion() {
        $session = session();
        $session->destroy(); // Supprime toutes les données de session
        return redirect()->to('/')->with('success', 'Déconnexion réussie !');
    }


    public function modifierProfil() {
        $session = session();

        $monmodel = new \App\Models\Monmodele();

        $data = [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'login' => $this->request->getPost('login'),
            'mail' => $this->request->getPost('mail')
        ];

        if (!empty($this->request->getPost('motdepasse'))) {
            $data['mdp'] = password_hash($this->request->getPost('motdepasse'), PASSWORD_DEFAULT);
        }

        $monmodel->updateUser($session->get('id'), $data); // met à jour les informations de l'utilisateur dans la base de données en utilisant son ID stocké dans la session.

        $session->set($data);

        return redirect()->to('/pgProfil')->with('success', 'Profil mis à jour avec succès.');
    }

    public function inscriptionEnvoieTF(){ 
        $session = session();
        $monmodel = new \App\Models\Monmodele();
        
        $data = [
            'id_utilisateur' => $session->get('id'),
            'id_temps_fort' => $this->request->getPost('idTempsFort'),
            'accompagnateur' => $this->request->getPost('accompagnateur'),
            'date' => $this->request->getPost('date')
        ];
    
        // Vérifier si l'utilisateur est déjà inscrit
        if ($monmodel->verifInscriptionTempsFort($data) > 0) {
            return redirect()->to('/tempsForts')->with('danger', 'Inscription échouée ! Vous êtes déjà inscrit à ce temps fort pour la même date.');
        }
    
        // Insérer la réservation
        if ($monmodel->inscriptionTempsFort($data)) {
            return redirect()->to('/tempsForts')->with('success', 'Inscription réussie !');
        } else {
            return redirect()->to('/tempsForts')->with('danger', 'Erreur lors de l\'inscription.');
        }
    }
    
    








    // MAIRE
        public function pgGestionTempsFort($action = 'pgGestionTempsFort') {

        // Vérifier si l'utilisateur est connecté et a le rôle "maire"
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'maire') {
            return redirect()->to('/')->with('error', 'Accès non autorisé.');
        }

        $model = new \App\Models\Monmodele();

        $tempsForts = $model->getAllTempsForts();
        
        // Affiche le formulaire dans une vue qui inclut le menu, header et footer
        return view('menu').view('header').view('afficherTempsFort', ['tempsForts' => $tempsForts]).view('gestionTempsFort').view('footer');
        }



        public function creerTempsFort() {
        // Vérifier que l'utilisateur a le droit d'accéder à cette fonctionnalité
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'maire') {
            return redirect()->to('/')->with('error', 'Accès non autorisé.');
        }

        // Définir les règles de validation
        $rules = [
            'libelle'              => 'required|max_length[255]',
            'description'        => 'required',
            'date_debut'         => 'required|valid_date',
            'date_fin'           => 'required|valid_date',
            'participant_max'  => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            // En cas d'erreurs, redirige en conservant les erreurs et les anciennes valeurs
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Récupérer les données du formulaire
        $data = [
            'libelle'             => $this->request->getPost('libelle'),
            'description'       => $this->request->getPost('description'),
            'date_debut'        => $this->request->getPost('date_debut'),
            'date_fin'          => $this->request->getPost('date_fin'),
            'participant_max' => $this->request->getPost('participant_max'),
            'img'             => $this->request->getPost('img')
        ];

        // Appele le modèle pour insérer les données
        $monmodel = new \App\Models\Monmodele();
        $monmodel->creerTempsFort($data);

        return redirect()->to('/pgGestionTempsFort')->with('success', 'Temps fort créé avec succès.');
        }

        public function modifierTempsFort($id) {
            $session = session();
        
            if (!$session->get('isLoggedIn') || $session->get('role') !== 'maire') {
                return redirect()->to('/')->with('error', 'Accès non autorisé.');
            }
        
            $monmodel = new \App\Models\Monmodele();
        
            if ($this->request->getMethod() === 'post') {
                // Traitement de la modification
                $rules = [
                    'libelle'        => 'required|max_length[255]',
                    'description'    => 'required',
                    'date_debut'     => 'required|valid_date',
                    'date_fin'       => 'required|valid_date',
                    'participant_max'=> 'required|integer'
                ];
        
                if (!$this->validate($rules)) {
                    return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
                }
        
                $data = [
                    'libelle'        => $this->request->getPost('libelle'),
                    'description'    => $this->request->getPost('description'),
                    'date_debut'     => $this->request->getPost('date_debut'),
                    'date_fin'       => $this->request->getPost('date_fin'),
                    'participant_max'=> $this->request->getPost('participant_max')
                ];
        
                $monmodel->updateTempsFort($id, $data);
        
                return redirect()->to('/pgGestionTempsFort')->with('success', 'Temps fort modifié avec succès.');
            } else {
                // Affichage du formulaire avec les données actuelles
                $tempsFort = $monmodel->getTempsFortById($id);
        
                if (!$tempsFort) {
                    return redirect()->to('/pgGestionTempsFort')->with('error', 'Temps fort introuvable.');
                }
        
                return view('menu').view('header').view('modifierTempsFort', ['tempsFort' => $tempsFort]).view('footer');
            }
        }

        public function supprimerTempsFort($id) {
            $session = session();
        
            if (!$session->get('isLoggedIn') || $session->get('role') !== 'maire') {
                return redirect()->to('/')->with('error', 'Accès non autorisé.');
            }
        
            $monmodel = new \App\Models\Monmodele();
        
            if ($monmodel->deleteTempsFort($id)) {
                return redirect()->to('/pgGestionTempsFort')->with('success', 'Temps fort supprimé avec succès.');
            } else {
                return redirect()->to('/pgGestionTempsFort')->with('error', 'Impossible de supprimer le temps fort.');
            }
        }
        
        

        








    

    
}