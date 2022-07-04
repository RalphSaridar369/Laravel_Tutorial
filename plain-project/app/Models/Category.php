<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = [
        'category name'
    ];

    public function getAllProducts(){
        return $this->hasMany('App\Models\Product');
    }
}
