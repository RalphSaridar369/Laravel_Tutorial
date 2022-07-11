<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasProducts extends Model
{
    use HasFactory;

    public $table = 'hasproducts';
    public $fillable= [
        'warehouse_id',
        'product_id',
        'quantity',
    ];
}
