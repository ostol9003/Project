<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Recipe;

class Category extends Model
{
    protected $table = "Categories";
    protected $primaryKey = "id";

    public $id;
    public $name;
    public $is_active;
    public $created_at;
    public $updated_at;

    
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipe_category');
    }
}
?>
