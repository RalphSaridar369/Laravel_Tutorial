<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public $fillable = [
    'warehouse name',
    ];

    public function allEmployees(){
        return $this->hasMany('App\Models\Employee');
    }
}
