<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //
    function getAllWarehouses(Warehouse $warehouse)
    {
        return $warehouse->all();
    }
    
    function getWarehouseById(Warehouse $warehouse,Request $req){
        return $warehouse->findOrFail($req->route('id'));
    }

    function deleteWarehouse(Warehouse $warehouse, Request $req)
    {
        if (!$warehouse->find($req->route('id'))) {
            return [
                'status' => 'failed',
                'message' => "user doesn't exist"
            ];
        } else {
            $warehouse->destroy($req->route('id'));
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createWarehouse(Warehouse $warehouse, Request $req)
    {
        return 'test';
    }

    function updateWarehouse(Warehouse $product, Request $req)
    {
        return 'test';
    }
}
