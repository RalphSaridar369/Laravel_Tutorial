<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'warehouse';
    public $fillable = [
    'warehouse_name',
    ];

    public function allEmployees(){
        return $this->hasMany('App\Models\Employee');
    }

    public function allproducts(){
        return $this->belongsToMany('App\Models\Product');
    }
}
