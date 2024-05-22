<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeIngredientController;
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

// Recipe
Route::get("/recipes", [RecipeController::class, "index"]);
Route::get("/recipes/create", [RecipeController::class, "create"]);
Route::get("/recipes/edit/{id}", [RecipeController::class, "edit"]);

Route::post("/recipes/add-to-db", [RecipeController::class, "addToDb"]);
Route::post("/recipes/update/{id}", [RecipeController::class, "update"]);
Route::post("/recipes/delete/{id}", [RecipeController::class, "delete"]);

// RecipeCategory
Route::get("/recipe-category", [RecipeCategoryController::class, "index"]);
Route::get("/recipe-category/create", [RecipeCategoryController::class, "create"]);
Route::get("/recipe-category/edit/{id}", [RecipeCategoryController::class, "edit"]);

Route::post("/recipe-category/add-to-db", [RecipeCategoryController::class, "addToDb"]);
Route::post("/recipe-category/update/{id}", [RecipeCategoryController::class, "update"]);
Route::post("/recipe-category/delete/{id}", [RecipeCategoryController::class, "delete"]);

// RecipeIngredient
Route::get("/recipe-ingredient", [RecipeIngredientController::class, "index"]);
Route::get("/recipe-ingredient/create", [RecipeIngredientController::class, "create"]);
Route::get("/recipe-ingredient/edit/{id}", [RecipeIngredientController::class, "edit"]);

Route::post("/recipe-ingredient/add-to-db", [RecipeIngredientController::class, "addToDb"]);
Route::post("/recipe-ingredient/update/{id}", [RecipeIngredientController::class, "update"]);
Route::post("/recipe-ingredient/delete/{id}", [RecipeIngredientController::class, "delete"]);

// User
Route::get("/users", [UserController::class, "index"]);
Route::get("/users/create", [UserController::class, "create"]);
Route::get("/users/edit/{id}", [UserController::class, "edit"]);

Route::post("/users/add-to-db", [UserController::class, "addToDb"]);
Route::post("/users/update/{id}", [UserController::class, "update"]);
Route::post("/users/delete/{id}", [UserController::class, "delete"]);