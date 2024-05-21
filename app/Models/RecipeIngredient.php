<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ingredient;
use Recipe;

class RecipeIngredient extends Model
{
    protected $table = "Recipe_Ingredients";
    protected $primaryKey = "id";

    public $id;
    public $recipe_id;
    public $ingredient_id;
    public $quantity;
    public $unit;
    public $is_active;
    public $created_at;
    public $updated_at;

    // Definicja relacji
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
?>
