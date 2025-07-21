<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\ToDoListController; 
use App\Models\Todolist;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('todolist', ToDoListController::class);