<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Okres;

use App\Models\Obec;
use App\Models\Kraj;


class Home extends BaseController
{

    var $obec;
    var $okres;
    var $kraj;
    
    public function __construct()
    {
        $this->obec = new Obec();
        $this->okres = new Okres();
        $this->kraj = new Kraj();
        
    }


    
    public function index(): string
    {
        return view('welcome_message');
    }


    public function index1()
    {
        $tabulka = $this->okres->where("kraj",141)->findAll();
      //  $tabulka = $this->okres->where("kod",$kodOkresu)->findAll();
        $data["okres"] = $tabulka;


        echo view("index1", $data);

        
    }




  


 
}
