<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee type'
    ];

    public function users(){
        return $this->hasMany('App\Models\Employee');
    }
}
