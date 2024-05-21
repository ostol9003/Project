<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "index"]);

// Internal Events 
Route::get("/categories", [CategoryController::class, "index"]);
Route::get("/categories/create", [CategoryController::class, "create"]);
Route::get("/categories/edit/{id}", [CategoryController::class, "edit"]);

Route::post("/categories/add-to-db", [CategoryController::class, "addToDb"]);
Route::post("/categories/update/{id}", [CategoryController::class, "update"]);
Route::post("/categories/delete/{id}", [CategoryController::class, "delete"]);