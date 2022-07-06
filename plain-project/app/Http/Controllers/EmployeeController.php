<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    function getAllEmployees(Employee $emp){
        return $emp->all();
    }

    function getEmployeeById(Employee $emp,Request $req){
        return $emp->findOrFail($req->route('id'));
    }
    
    function deleteEmployee(Employee $emp,Request $req){
        if(!$emp->find($req->route('id'))){
        return [
            'status' => 'failed',
            'message' => "user doesn't exist"
        ];
        }
        else{
            $emp->destroy($req->route('id'));
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
