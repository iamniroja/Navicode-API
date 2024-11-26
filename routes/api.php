<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\memberController;



//list all clients
Route::get('/clients',[clientController::class,'index']);
// show specific client by id
Route::get('/clients/{id}',[clientController::class,'show']);
// create new client
Route::post('/clients',[clientController::class,'store']);
//update client by id
Route::put('/clients/{id}',[clientController::class,'update']);


//list all members
Route::get('/members',[memberController::class,'index']);
// show specific member by id
Route::get('/members/{id}',[memberController::class,'show']);
// create new member
Route::post('/members',[memberController::class,'store']);
//update member by id
Route::put('/members/{id}',[memberController::class,'update']);
//Delete member by id
Route::delete('/members/{id}', [MemberController::class, 'destroy']);





