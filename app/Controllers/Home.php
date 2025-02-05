<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Obec;
use App\Models\Okres;




class Home extends BaseController
{



    var $obec;
    var $okres;
  
    public function __construct()
    {
        $this->obec = new Obec();
        $this->okres = new Okres();
       
    }










    public function index(): string
    {
        return view('welcome_message');
    }


    public function index1(): void
    {
        $tabulka = $this->obec->findAll();
        $data["mista"] = $tabulka;
        echo view("index1", $data);
    }

  









}
