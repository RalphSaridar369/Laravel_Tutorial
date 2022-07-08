<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $table = 'employeetype';
    protected $fillable = [
        'employee_type'
    ];

    public function users(){
        return $this->hasMany('App\Models\Employee');
    }
}
