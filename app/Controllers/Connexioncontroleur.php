<?php

namespace App\Controllers;

class Connexioncontroleur extends BaseController
{
    public function index($action = 'accueil')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('header').view('inscription');
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
                return view('header') . view('inscription');
            }
            else{
                return view('header') . view('inscription');
            }
        } else {
            return view('header') . view('inscription', ['errors' => $this->validator->getErrors()]);
        }
    }
}