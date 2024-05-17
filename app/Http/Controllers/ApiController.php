<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public static function call(){
        $responseProv = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provinsi = $responseProv->object();
        $list=array();

        foreach($provinsi as $p){
            array_push($list,$p);
        }

        $listProv=array();
        $idProv=array();
        foreach($list[0] as $l){
            array_push($listProv, $l->nama);
            array_push($idProv, $l->id);
        }

        $dict_provinsi =[];
        for($i=0;$i<count($listProv); $i++){
            $dict_provinsi[$idProv[$i]] = $listProv[$i];
        }

        return $dict_provinsi;
    }
}
