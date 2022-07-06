<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeetypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;

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


Route::group(
    [
        'middleware'=>'api',
        'prefix'=>'employeetype',
    ],
    function ($router){
        Route::get('/',[
            EmployeetypeController::class,
            'getAllEmployeeTypes'
        ]);
        
        Route::delete('/{id}',[
            EmployeetypeController::class,
            'deleteEmployeeType'
        ]);
        
        Route::post('/',[
            EmployeetypeController::class,
            'createEmployeeType'
        ]);
        
        Route::put('/{id}',[
            EmployeetypeController::class,
            'updateEmployeeType'
        ]);
    }
);


Route::group(
    [
        'middleware'=>'api',
        'prefix'=>'products',
    ],
    function ($router){
        Route::get('/',[
            ProductController::class,
            'getAllProducts'
        ]);
        
        Route::get('/{id}',[
            ProductController::class,
            'getProductById'
        ]);
        
        Route::delete('/{id}',[
            ProductController::class,
            'deleteProduct'
        ]);
        
        Route::post('/',[
            ProductController::class,
            'createProduct'
        ]);
        
        Route::put('/{id}',[
            ProductController::class,
            'updateProduct'
        ]);
    }
);

Route::group(
    [
        'middleware'=>'api',
        'prefix'=>'warehouses',
    ],
    function ($router){
        Route::get('/',[
            WarehouseController::class,
            'getAllWarehouses'
        ]);
        
        Route::get('/{id}',[
            WarehouseController::class,
            'getWarehouseById'
        ]);
        
        Route::delete('/{id}',[
            WarehouseController::class,
            'deleteWarehouse'
        ]);
        
        Route::post('/',[
            WarehouseController::class,
            'createWarehouse'
        ]);
        
        Route::put('/{id}',[
            WarehouseController::class,
            'updateWrehouse'
        ]);
    }
);