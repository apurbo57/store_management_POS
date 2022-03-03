<?php

function slugify($text){
    //replace non letter or digits 
    $text = preg_replace('/[^\p{L}\p{N} ]+/', '', $text);

    //translitarate
    $text = iconv('UTF-8', 'us-ascii//TRANSLIT', $text);

    //remove unwanted charecters
    $text =  preg_replace('/[^a-z\d ]/i', '', $text);

    //trim
    $text = trim($text, '-');

    //remove duplicate -
    $text = preg_replace('~(?>@|\G(?<!^)[^@]*)\K@*~', '', $text);

    //backspace remove 
    $text = str_replace(' ', '-', $text);

    //lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function setMessage($type, $message){
    session()->flash('type',$type);
    session()->flash('message',$message);
}

function color(){
    return [
        '1' => 'Black',
        '2' => 'White',
        '3' => 'green',
        '4' => 'red',
        '5' => 'blue',
        '6' => 'yewllo'
    ];
}

function size(){
    return [
        '1' => 'S',
        '2' => 'M',
        '3' => 'L',
        '4' => 'XL',
        '5' => 'XXL'
    ];
}
