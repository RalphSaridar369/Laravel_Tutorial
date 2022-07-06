<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeetypeController extends Controller
{
    //
    function getAllEmployeeTypes(EmployeeType $emptype)
    {
        return $emptype->all();
    }

    function deleteEmployeeType(EmployeeType $emptype, Request $req)
    {
        if (!$emptype->find($req->route('id'))) {
            return [
                'status' => 'failed',
                'message' => "user doesn't exist"
            ];
        } else {
            $emptype->destroy($req->route('id'));
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
