<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeetypeController extends Controller
{
    //
    function getAllEmployeeTypes(EmployeeType $emptype)
    {
        return $emptype->with('users')->get();
    }

    function getAllEmployeesByType(EmployeeType $emptype,$id){
        return $emptype->with('users')->where('id','=',$id)->get();
    }

    function deleteEmployeeType(EmployeeType $emptype, $id)
    {
        if (!$emptype->where('id','=',$id)) {
            return [
                'status' => 'failed',
                'message' => "type doesn't exist"
            ];
        } else {
            $emptype->destroy($id);
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createEmployeeType(EmployeeType $emptype, Request $req)
    {
        return 'test';
    }

    function updateEmployeeType(EmployeeType $emptype, Request $req)
    {
        return 'test';
    }
}
