<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model {

    protected $table = "UsersDb";
    protected $primaryKey = "id";
    
    public $id;
    public $name;
    public $email;
    public $password;
    public $is_active;
    public $created_at;
    public $updated_at;

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}