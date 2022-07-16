<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //
    function getAllWarehouses(Warehouse $warehouse)
    {
        return $warehouse->with('allEmployees')->get();
    }
    
    function getWarehouseById(Warehouse $warehouse, $id){
        return $warehouse->with('allEmployees')->where('id','=',$id)->get();
    }

    function deleteWarehouse(Warehouse $warehouse, $id)
    {
        if (!$warehouse->where('id','=',$id)) {
            return [
                'status' => 'failed',
                'message' => "warehouse doesn't exist"
            ];
        } else {
            $warehouse->destroy($id);
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createWarehouse(Warehouse $warehouse, Request $req)
    {
        Warehouse::create(array_merge([
            "warehouse_name" => $req->warehouse_name,
        ]));
        
        return $req;
    }

    function updateWarehouse(Warehouse $product, Request $req, $id)
    {
        Warehouse::where('id','=',$id)->update(array_merge([
            "warehouse_name" => $req->warehouse_name,
        ]));
        
        return $req;
    }
}
