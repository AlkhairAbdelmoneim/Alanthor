<?php
use App\Models\Students;

function getMessage($msg , $type){

    $noty = array(
        'message' => $msg,
        'alert-type' => $type
    );

    return $noty;
}

function getLocale(){

    return $lang =[
        'ar',
        'en',
    ];

    
}

function getCurrentLocale(){

    return  LaravelLocalization::getCurrentLocale();
}

function getDefaultLang(){

    return Config::get('app.locale');
}

function getTime($time)
{
    return date_format($time , 'Y-m-d g:i') ;
}

function dataFilter($data){

    $data->filter(function($value, $key){

        return $value->description = Str::limit($value->description , 30);
        
    }); 
    
    return $data;
}


