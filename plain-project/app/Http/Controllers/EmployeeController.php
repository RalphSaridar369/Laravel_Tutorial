<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //

    
    function register(Employee $emp, Request $req)
    {
        error_log('inside the controller');
        return $req;
    }

    function login(Employee $emp, Request $req)
    {
        $checkEmail = $emp->where('email', '=', $req->email)->get();
        $checkPassword = $emp->where([
            'email' => $req->email,
            'password' => $req->password
        ])->get();

        if (sizeof($checkEmail) < 1) {
            return [
                'status' => 'failed',
                'message' => "user doesn't exist"
            ];
        } 

        else if (sizeof($checkPassword) < 1) {
            return [
                'status' => 'failed',
                'message' => "wrong password exist"
            ];
        }

        else{
            return [
                'status' => 'success',
                'message' => "successfully logged in"
            ];
        }
    }

    function getAllEmployees(Employee $emp)
    {
        return $emp->with('employeeType', 'warehouse')->get();
    }

    function getEmployeeById(Employee $emp, $id)
    {
        return $emp->with('employeeType', 'warehouse')->where('id', '=', $id)->get();
    }

    function deleteEmployee(Employee $emp, $id)
    {
        if (!$emp->where('id', '=', $id)) {
            return [
                'status' => 'failed',
                'message' => "user doesn't exist"
            ];
        } else {
            $emp->destroy($id);
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createEmployee(Employee $emp, Request $req)
    {
        return 'test';
    }

    function updateEmployee(Employee $emp, Request $req)
    {
        return 'test';
    }
}
