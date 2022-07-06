<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(
    [
        'middleware'=>'api',
        'prefix'=>'employees',
    ],
    function ($router){
        Route::get('/',[
            EmployeeController::class,
            'getAllEmployees'
        ]);
        
        Route::get('/{id}',[
            EmployeeController::class,
            'getEmployeeById'
        ]);
        
        Route::delete('/{id}',[
            EmployeeController::class,
            'deleteEmployee'
        ]);
        
        Route::post('/',[
            EmployeeController::class,
            'createEmployee'
        ]);
        
        Route::put('/{id}',[
            EmployeeController::class,
            'updateEmployee'
        ]);
    }
);


Route::group(
    [
        'middleware'=>'api',
        'prefix'=>'categories',
    ],
    function ($router){
        Route::get('/',[
            CategoryController::class,
            'getAllCategories'
        ]);
        
        Route::get('/{id}',[
            CategoryController::class,
            'getCategoryById'
        ]);
        
        Route::delete('/{id}',[
            CategoryController::class,
            'deleteCategory'
        ]);
        
        Route::post('/',[
            CategoryController::class,
            'createCategory'
        ]);
        
        Route::put('/{id}',[
            CategoryController::class,
            'updateCategory'
        ]);
    }
);