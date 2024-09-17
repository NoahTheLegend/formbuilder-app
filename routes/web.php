<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Form;

Route::get('/', function () {
    return view('main');
});
