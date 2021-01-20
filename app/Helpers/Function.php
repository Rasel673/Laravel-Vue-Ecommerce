<?php

function slugify($text){

    //replace non letter or digit by 
    $text=preg_replace('~[^\pL\d]+~u','-',$text);
    //trans literate--
    $text=iconv('utf-8','us-ascii//TRANSLIT',$text);
//remove unwanted character
 $text=preg_replace('~[^-\w]+~','',$text);
 // trim character
    $text=trim($text,'-');
    //remove duplicate 
    $text=preg_replace('~-+~','-',$text);
//lower case ------------
    $text=strtolower($text);

    if(empty($text)){
        return 'n-a';

    }

    return $text;



}

function imageConvert($image){
    $explode1=explode(',',$image);
    $explode2=explode(';',$explode1[0]);
    $explode3=explode('/', $explode2[0]);
    $extention=$explode3[1];
    $filename=time().'.'.$extention;
    return $filename;
}