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


    public function okres($kod, $perPage)
    {

        $data["obec"] = $this->obec->select(select:"obec.nazev, count(*) as pocet ")-> 
        join("cast_obce", "obec-kod = cast_obce.obec","inner")->
        join("ulice", "ulice cast_obce = cast_obce.kod","inner")->join
        ("adresni_misto", "adresni_misto.ulice = ulice.kod", "inner")->join
        ("okres", "okres.kod = obec.okres")->
        where("okres.kod", $kod)->
        groupBy("obec.kod")->
        orderBy("pocet", "desc")->
        paginate($perPage);
        $data["perPage"] = $perPage;
        $data["kod"] = $kod;
        $pager = $this->obec->pager;
        $data["pager"] = $pager;
        echo view ("okres", $data);

        
    }



  


 
}
