<?php
namespace App\Models;

use App\Models\Category;
use App\Models\RecipeIngredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model {

    protected $table = "Recipes";
    protected $primaryKey = "id";
    
    private $id;
    private $user_id;
    private $title;
    private $description;
    private $cooking_time;
    private $is_active;
    private $created_at;
    private $updated_at;
    private $url;
    private $is_promoted;

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

