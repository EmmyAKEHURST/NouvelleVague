<?php

namespace App\Controllers;

class Controleurmain extends BaseController
{   
    //------------------------------------------------------------------------------------LES PAGES------------------------------------------------------------------------------------
    //PAGE D'ACCUEIL
    public function index($action = 'index')
    {
        $monmodel = new \App\Models\Monmodele();
        $data = [
            'tempsforts' => $monmodel->getTempsForts()
        ];
        return view('menu').view('accueilheader').view('accueilinfo', $data).view('footer');
    }
    
    //PAGE D'INSCRIPTION
    public function pgInscription($action = 'pgInscription')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('header').view('inscription').view('footer');
    }

    //PAGE DE CONNEXION
    public function pgConnexion($action = 'pgConnexion')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('header').view('connexion').view('footer');
    }

    //------------------------------------------------------------------------------------LES FONCTIONS------------------------------------------------------------------------------------
    public function inscription()
    {
        $monmodel = new \App\Models\Monmodele();
        $rules = [
            'prenom' => 'required|max_length[50]',
            'nom' => 'required|max_length[50]',
            'login' => 'required|max_length[50]',
            'mail' => 'required|valid_email',
            'motdepasse' => [
                'rules' => 'required|min_length[12]|regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W]).+$/]',
                'errors' => [
                    'regex_match' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.',
                ],
            'validermotdepasse' => 'required|matches[motdepasse]'
            ]
        ];
        if ($this->validate($rules)) {
            if($monmodel->verifmail($this->request->getPost()) == 0){
                $monmodel->inscriptionValider($this->request->getPost());
                return view('menu').view('header').view('inscription').view('footer');
            }
            else{
                return view('menu').view('header').view('inscription').view('footer');
            }
        } else {
            return view('menu').view('header').view('inscription').view('footer', ['errors' => $this->validator->getErrors()]);
        }
    }

    public function connexion()
    {
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




    

    
}