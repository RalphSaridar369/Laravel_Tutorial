<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    function getAllEmployees(Employee $emp){
        return $emp->with('employeeType','warehouse')->get();
    }

    function getEmployeeById(Employee $emp,$id){
        return $emp->with('employeeType','warehouse')->where('id','=',$id)->get();
    }
    
    function deleteEmployee(Employee $emp,$id){
        if(!$emp->where('id','=',$id)){
        return [
            'status' => 'failed',
            'message' => "user doesn't exist"
        ];
        }
        else{
            $emp->destroy($id);
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createEmployee(Employee $emp, Request $req){
        return 'test';
    }

    function updateEmployee(Employee $emp, Request $req){
        return 'test';
    }
}
