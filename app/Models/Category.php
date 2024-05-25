<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Recipe;

class Category extends Model
{
    protected $table = "Categories";
    protected $primaryKey = "id";

    private $id;
    private $name;
    private $is_active;
    private $created_at;
    private $updated_at;
    private $url;

    
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipe_category');
    }
}
?>
