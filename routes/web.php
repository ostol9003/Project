<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "index"]);

// Category
Route::get("/categories", [CategoryController::class, "index"]);
Route::get("/categories/create", [CategoryController::class, "create"]);
Route::get("/categories/edit/{id}", [CategoryController::class, "edit"]);

Route::post("/categories/add-to-db", [CategoryController::class, "addToDb"]);
Route::post("/categories/update/{id}", [CategoryController::class, "update"]);
Route::post("/categories/delete/{id}", [CategoryController::class, "delete"]);

// Ingredient
Route::get("/ingredients", [IngredientController::class, "index"]);
Route::get("/ingredients/create", [IngredientController::class, "create"]);
Route::get("/ingredients/edit/{id}", [IngredientController::class, "edit"]);

Route::post("/ingredients/add-to-db", [IngredientController::class, "addToDb"]);
Route::post("/ingredients/update/{id}", [IngredientController::class, "update"]);
Route::post("/ingredients/delete/{id}", [IngredientController::class, "delete"]);


// User
Route::get("/users", [UserController::class, "index"]);
Route::get("/users/create", [UserController::class, "create"]);
Route::get("/users/edit/{id}", [UserController::class, "edit"]);

Route::post("/users/add-to-db", [UserController::class, "addToDb"]);
Route::post("/users/update/{id}", [UserController::class, "update"]);
Route::post("/users/delete/{id}", [UserController::class, "delete"]);