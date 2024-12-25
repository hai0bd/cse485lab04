<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
//use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('books', BookController::class);


//route::get('/borrows',[BorrowController::class,'index'])->name('borrows.index');
//route::put('/borrows/{id}',[BorrowController::class,'update'])->name('borrows.update');

