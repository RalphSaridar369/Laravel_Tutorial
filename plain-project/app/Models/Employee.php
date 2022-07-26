<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
// use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Model /* implements JWTSubject */
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    public $table = 'employee';

    protected $fillable = [
        'email',
        'password',
        'employee_type_id',
        'warehouse_id',
    ];

    // protected $hidden = [
    //     'password'
    // ];

    public function employeeType()
    {
        return $this->belongsTo('App\Models\EmployeeType');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }

    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }
}
