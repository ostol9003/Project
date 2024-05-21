<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Recipe;

class RecipeCategory extends Model
{
    protected $table = "Recipe_Category";
    protected $primaryKey = "id";
    
    public $id;
    public $recipe_id;
    public $category_id;
    public $is_active;
    public $created_at;
    public $updated_at;

    
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
?>
