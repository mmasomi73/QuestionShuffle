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