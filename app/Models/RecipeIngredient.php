<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Ingredient;
use App\Models\Recipe;

class RecipeIngredient extends Model
{
    protected $table = "Recipe_Ingredient";
    protected $primaryKey = "id";

    private $id;
    private $recipe_id;
    private $ingredient_id;
    private $quantity;
    private $unit;
    private $is_active;
    private $created_at;
    private $updated_at;

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
