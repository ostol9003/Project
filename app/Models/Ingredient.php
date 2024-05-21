<?php

use App\Models\RecipeIngredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model {

    protected $table = "Ingredients";
    protected $primaryKey = "id";

    public $id;
    public $name;
    public $quantity;
    public $unit;
    public $is_active;
    public $created_at;
    public $updated_at;

    public function recipeIngredients(): HasMany
    {
        return $this->HasMany(RecipeIngredient::class);
    }
}

