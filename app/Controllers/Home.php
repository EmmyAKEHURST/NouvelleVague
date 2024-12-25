<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['liste'] = array("Frapper Deniz", "Apprendre le cours :p");
        return view('mavue',$data);
    }

}
