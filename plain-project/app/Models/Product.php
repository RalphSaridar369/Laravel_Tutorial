<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'product';
    public $fillable = [
        'product_name',
        'price',
        'category_id'
    ];


    public function allWarehouse(){
        return $this->belongsToMany('App\Models\Product')
        ->withPivot(
            'warehouse_id',
            'product_id',
            'quantity',
        );
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
