<?php

function getOption($option){
    switch ($option){
        case 'a':
            return 'الف) ';
            break;
        case 'b':
            return 'ب) ';
            break;
        case 'c':
            return 'ج) ';
            break;
        case 'd':
            return 'د) ';
            break;
        default:
            return 'الف) ';
    }
}

function randomString($length = 6)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $length; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}