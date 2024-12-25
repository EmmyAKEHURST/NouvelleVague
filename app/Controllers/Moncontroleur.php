<?php

namespace App\Controllers;
class Moncontroleur extends BaseController{

    public function index()
    {
    $monmodel = new \App\Models\Monmodele();
    $data['lescontacts'] = $monmodel->getLesContacts();
    return view('mavue', $data);
    }

    public function init()
    {
        $data = ['titre' => "Mon titre",
                'nom' => "Maître",
                'prenom' => "Yoda",
                'liste' => ["Frapper Deniz", "blalblamiaou"]
    ];
    return $data;
    }

    public function mafonction($param1 = false, $param2 = false, $param3 = false)
    {
    echo 'Affichage des paramètres : '.$param1. ' '. $param2 . ' '. $param3 ;
    }

    public function validerformulaire()
    {
        if (!$this->request->is('post')){
            return view('monform');
        }
            
        $rules = [
            'numeroContact' => 'required|max_length[30]',
            'nomContact' => 'required|max_length[255]|min_length[10]',
            'prenomContact' => 'required|max_length[255]|matches[password]',
            'emailContact' => 'required|max_length[254]|valid_email',
        ];

        if (! $this->validate($rules)) { 
            return view('mavue');
            }
            
            $validData = $this->validator->getValidated();
            return view('success');
    }

}