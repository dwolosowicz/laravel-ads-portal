<?php

if( ! function_exists('array_mirror')) {
    function array_mirror($array) {
        return array_combine($array, $array);
    }
}

if( ! function_exists('var_or')) {
    function var_or($a, $b) {
        return $a ? $a : $b;
    }
}