<?php

use App\Models\Category;
use App\Models\RecipeIngredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model {

    protected $table = "Recipes";
    protected $primaryKey = "id";
    
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $cooking_time;
    public $is_active;
    public $created_at;
    public $updated_at;

   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }

   public function recipeIngredients(): HasMany
   {
       return $this->hasMany(RecipeIngredient::class);
   }

   public function categories(): BelongsToMany
   {
       return $this->belongsToMany(Category::class, 'recipe_category');
   }
}

