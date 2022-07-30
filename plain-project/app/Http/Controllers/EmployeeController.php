<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //


    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => [
        //     'login',
        //     'register'
        //     ]]);
    }

    function register(Employee $emp, Request $req)
    {
        error_log($req->password);
        Employee::create(array_merge([
            "email" => $req->email,
            "password" => Hash::make($req->password),
            "employee_type_id" => $req->employee_type_id,
            "warehouse_id" => $req->warehouse_id,
        ]));
        return $req;
    }

    function login(Employee $emp, Request $req)
    {
        $checkEmail = $emp->where('email', '=', $req->email)->get();

        if (sizeof($checkEmail) < 1) {
            return [
                'status' => 'failed',
                'message' => "user doesn't exist"
            ];
        } else if (!Hash::check($req->password, $checkEmail[0]->password)) {
            return [
                'status' => 'failed',
                'message' => "wrong password"
            ];
        } else {

            $credentials = request(['email', 'password']);


            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }


            $access = $this->respondWithToken($token);
            unset($checkEmail[0]['password']);
            return [
                'status' => 'success',
                'message' => "successfully logged in",
                'data' => $checkEmail[0],
                'access_token' => $access->original

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
        // return $req->bearerToken();
        error_log($req->password);
        Employee::create(array_merge([
            "email" => $req->email,
            "password" => Hash::make($req->password),
            "employee_type_id" => $req->employee_type_id,
            "warehouse_id" => $req->warehouse_id,
        ]));
        return $req;
    }
    function updateEmployee(Employee $emp, Request $req, $id)
    {
        error_log($req->password);
        Employee::where('id', '=', $id)->update(array_merge([
            "email" => $req->email,
            "password" => Hash::make($req->password),
            "employee_type_id" => $req->employee_type_id,
            "warehouse_id" => $req->warehouse_id,
        ]));
        return $req;
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }


    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);
    }
}
