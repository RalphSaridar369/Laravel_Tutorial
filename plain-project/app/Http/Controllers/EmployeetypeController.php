<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeetypeController extends Controller
{
    //validators

    function validateCreateAndUpdate()
    {
        return Validator::make(request()->all(), [
            "employee_type" => "required | string | min:8"
        ]);
    }

    //calls
    function getAllEmployeeTypes(EmployeeType $emptype)
    {
        return $emptype->with('users')->get();
    }

    function getAllEmployeesByType(EmployeeType $emptype, $id)
    {
        return $emptype->with('users')->where('id', '=', $id)->get();
    }

    function deleteEmployeeType(EmployeeType $emptype, $id)
    {
        if (!$emptype->where('id', '=', $id)) {
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
        $checkForErrors = $this->validateCreateAndUpdate();
        if ($checkForErrors->fails()) {
            return $checkForErrors->errors();
        }
        EmployeeType::create(array_merge([
            "employee_type" => $req->employee_type,
        ]));

        return $req;
    }

    function updateEmployeeType(EmployeeType $emptype, Request $req, $id)
    {
        $checkForErrors = $this->validateCreateAndUpdate();
        if ($checkForErrors->fails()) {
            return $checkForErrors->errors();
        }
        EmployeeType::where('id', '=', $id)->update(array_merge([
            "employee_type" => $req->employee_type,
        ]));

        return $req;
    }
}
