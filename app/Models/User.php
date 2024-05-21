<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model {

    protected $table = "UsersDb";
    protected $primaryKey = "id";
    
    private $id;
    private $name;
    private $email;
    private $password;
    private $is_active;
    private $created_at;
    private $updated_at;

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}