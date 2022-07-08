<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    public $table = 'employee';

    protected $fillable = [
        'email',
        'employee type id',
        'warehouse id',
    ];

    protected $hidden = [
        'password'
    ];

}
