<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function ()
{
    return view('home');
});

Route::get('/file', function(){
    return view('file_upload');
});

