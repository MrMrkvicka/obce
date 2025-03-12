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
    var $data = [];


    public function __construct($perPage = 20)
    {
        $this->obec = new Obec();
        $this->okres = new Okres();
        $this->kraj = new Kraj();
        
        $this->data["okres"] = $this->okres->where("kraj",141)->paginate($perPage);
        //  $tabulka = $this->okres->where("kod",$kodOkresu)->findAll();
        $this->data["perPage"] = $perPage;
        $pager = $this->obec->pager;
        $this->data["pager"] = $pager;

    }

    public function index(): string
    {

        $this->data['page_title'] = "Home";
        $this->data['obec'] = $this->obec->select("obec.nazev, Count(*) as pocet")->join("cast_obce", "obec.kod = cast_obce.obec", "inner")->join("ulice", "ulice.cast_obce = cast_obce.kod", "inner")->join("adresni_misto", "adresni_misto.ulice = ulice.kod", "inner")->join("okres", "okres.kod = obec.okres")->groupBy("obec.kod")->orderBy("pocet", "desc")->paginate(20);
        
        $pager = $this->obec->pager;
        $this->data['pager'] = $pager;
        return view('index1', $this->data);
    }




    public function okres($kod, $perPage = 20)
    {

        $this->data["obec"] = $this->obec->select(select:"obec.nazev, count(*) as pocet ")-> 
        join("cast_obce", "obec.kod = cast_obce.obec","inner")->
        join("ulice", "ulice.cast_obce = cast_obce.kod","inner")->join
        ("adresni_misto", "adresni_misto.ulice = ulice.kod", "inner")->join
        ("okres", "okres.kod = obec.okres")->
        where("okres.kod", $kod)->
        groupBy("obec.kod")->
        orderBy("pocet", "desc")->
        paginate($perPage);
        
        $this->data["perPage"] = $perPage;
        $this->data["kod"] = $kod;
        $pager = $this->obec->pager;
        $this->data["pager"] = $pager;
        echo view ("okres", $this ->data);


    }



  


 
}
