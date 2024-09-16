<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
 
Route::get('/user/{id}', function (Request $request, string $id) {
    return 'User '.$id.' a '.$request->acceptsHtml();
});

Route::get('/', function () {
    return view('main');
});
