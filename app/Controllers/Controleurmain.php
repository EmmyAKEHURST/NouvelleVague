<?php

namespace App\Controllers;

class Controleurmain extends BaseController
{
    public function index($action = 'index')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('accueilheader').view('accueilinfo').view('footer');
    }
    
    public function pgInscription($action = 'pgInscription')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('header').view('inscription').view('footer');
    }

    public function pgConnexion($action = 'pgConnexion')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('header').view('connexion').view('footer');
    }

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
}