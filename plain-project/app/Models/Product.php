<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'product name',
        'price',
        'category id'
    ];


    public function allWarehouse(){
        return $this->belongsToMany('App\Models\Warehouse');
    }
}
