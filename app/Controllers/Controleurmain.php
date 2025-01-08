<?php

namespace App\Controllers;

class Controleurmain extends BaseController
{
    public function index($action = 'accueil')
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu');
    }

    public function afficher()
    {
        $monmodel = new \App\Models\Monmodele();
        $data = ['contacts' => $monmodel->getLesContacts()];
        return view('menu').view('afficher', $data);
    }

    public function nbcontacts()
    {
        $monmodel = new \App\Models\Monmodele();
        $data = ['nbContacts' => $monmodel->nbContacts()];
        return view('menu').view('nbcontacts', $data);
    }

    public function ajouter()
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('ajouter');
    }

    public function ajoutervalider()
    {
        $monmodel = new \App\Models\Monmodele();
        $rules = [
            'nom' => 'required|max_length[50]',
            'prenom' => 'required|max_length[50]',
            'email' => 'required|max_length[50]|valid_email',
            'numero' => 'required|max_length[50]',
            'commentaire' => 'max_length[255]'
        ];
        if (!$this->validate($rules)) {
            return view('menu').view('ajouter'); //Si les données ne sont pas valides, on retourne à la vue du formulaire avec les erreurs
        }else{
            $monmodel->ajouterContact($this->request->getPost());
            return view('menu').view('ajouter');
        }
        return view('menu').view('ajouter');
    }

    public function supprimer()
    {
        $monmodel = new \App\Models\Monmodele();
        return view('menu').view('supprimer');
    }

    public function supprimervalider()
    {
        $monmodel = new \App\Models\Monmodele();
        $rules = [
            'numero' => 'required|max_length[50]'
        ];
        if (!$this->validate($rules)) {
            return view('menu').view('supprimer'); //Si les données ne sont pas valides, on retourne à la vue du formulaire avec les erreurs
        }else{
            $monmodel->supprimerContact($this->request->getPost());
            return view('menu').view('supprimer');
        }
        return view('menu').view('supprimer');
    }

}