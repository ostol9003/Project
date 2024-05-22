<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RecipeCategory extends Model
{
    protected $table = "Recipe_Category";
    protected $primaryKey = "id";
    
    private $id;
    private $recipe_id;
    private $category_id;
    private $is_active;
    private $created_at;
    private $updated_at;

    
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
