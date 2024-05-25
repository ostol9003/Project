<?php
namespace App\Models;
use App\Models\RecipeIngredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model {

    protected $table = "Ingredients";
    protected $primaryKey = "id";

    private $id;
    private $name;
    private $is_active;
    private $created_at;
    private $updated_at;

    public function recipeIngredients(): HasMany
    {
        return $this->HasMany(RecipeIngredient::class);
    }
}

