<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Form;

/*Route::get('/', function () {
    return view('main');
});*/

// CONTROLLERS
use App\Http\Controllers\SubmittedFormController;
Route::get('/', [SubmittedFormController::class, 'showForm'])->name('form');
Route::post('/submit-form', [SubmittedFormController::class, 'submitForm'])->name('submit.form');