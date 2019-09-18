<?php

/*********************Question 2 (Program to print Repeated Characters in a string)*********************/

function repeatedCharacters ($string) {
    
    $string = str_split($string);
    
    $length = count($string);
    
    for($i=0; $i < $length; $i++) {
        
        $newlist = $string[$i];
        
        if (count(array_keys($string, $newlist)) > 1) {
            print_r($newlist.' = '.count(array_keys($string, $newlist)));
        } 
    }
}

repeatedCharacters('banana');




/*********************Question 3 (Program to print first non-repeated character in a string)*********************/

function nonRepeatedCharacter ($string) {
    
    $string = str_split($string);
    
    $length = count($string);
    
    for($i=0; $i < $length; $i++) {
        
        $newlist = $string[$i];
        
        if (count(array_keys($string, $newlist)) <= 1) {
            print_r($newlist);
            
            exit();
        } 
    }
}

nonRepeatedCharacter('defend');

?>