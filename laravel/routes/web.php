<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ui', [
        'title' => 'Diamond Academy',
        'headerTitle' => 'Diamond Academy Documentation'
    ]);
});
