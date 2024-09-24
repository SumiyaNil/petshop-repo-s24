<?php

use App\Http\Controllers\Api\AccessoriesController;
use App\Models\Accessories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-all-accessories',[AccessoriesController::class,'getAccessories']);
Route::post('/create-accessories',[AccessoriesController::class,'createAccessories']);
Route::post('/update-accessories/{id}',[AccessoriesController::class,'updateAccessories']);
Route::get('/delete-accessories/{id}',[AccessoriesController::class,'deleteAccessories']);