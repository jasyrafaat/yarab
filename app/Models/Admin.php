<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable=['name','email',"password","gender","permission"];

    public function setPermissionAttribute($value){
        return $this->attributes["permission"] =implode("+",$value);

    }
    public function getPermissionAttribute($value){
        return explode("+",$value);
    }


    protected function casts(): array
    {
        return [
            'password' => 'hashed',

        ];
    }
}
