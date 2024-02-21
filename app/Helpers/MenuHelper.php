<?php

use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $val) {
            if (Route::is($val)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}