<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'category';
    public $fillable = [
        'category_name'
    ];

    public function getAllProducts(){
        return $this->hasMany('App\Models\Product');
    }
}
