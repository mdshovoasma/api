<?php

namespace App\Http\Helpers;

trait jasonhelpers{
    function success($success='success',$mgs,$data,$status=200){
        return response()->json([
            "status"=>$success,
            "message"=>$mgs,
            "data"=>$data

        ],$status);
    }


    function erorr($erorr='erorr',$mgs,$data,$status=401){
        return response()->json([
            "status"=>$erorr,
            "message"=>$mgs,
            "data"=>$data

        ],$status);
    }




}







?>