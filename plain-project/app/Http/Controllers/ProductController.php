<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //validators

    function validateCreateAndUpdate()
    {
        return Validator::make(request()->all(), [
            "product_name" => "required | string | min:8",
            "price" => "required | integer",
            "category_id" => "required | integer"
        ]);
    }

    //calls
    function index(Product $product)
    {
        return $product->with('category')->get();
    }

    function getProductById(Product $product, $id)
    {
        return $product->with('category')->where('id', '=', $id)->get();
    }

    function getAllProductsByWarehouse(Product $product, $id)
    {
        return $product->allWarehouse->where('warehouse_id', '=', $id)->get();
    }

    function deleteProduct(Product $product, $id)
    {
        if (!$product->where('id', '=', $id)) {
            return [
                'status' => 'failed',
                'message' => "product doesn't exist"
            ];
        } else {
            $product->destroy($id);
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createProduct(Product $product, Request $req)
    {

        $checkForErrors = $this->validateCreateAndUpdate();
        if ($checkForErrors->fails()) {
            return $checkForErrors->errors();
        }
        Product::create(array_merge([
            "product_name" => $req->product_name,
            "price" => $req->price,
            "category_id" => $req->category_id
        ]));

        return $req;
    }

    function updateProduct(Product $product, Request $req, $id)
    {

        $checkForErrors = $this->validateCreateAndUpdate();
        if ($checkForErrors->fails()) {
            return $checkForErrors->errors();
        }
        Product::where('id', '=', $id)->update(array_merge([
            "product_name" => $req->product_name,
            "price" => $req->price,
            "category_id" => $req->category_id
        ]));

        return $req;
    }

    function getAllProductsWarehouse()
    {
        return DB::table('hasProducts')->get();
    }

    function getProductQuantityByProductId($id)
    {
        $data = DB::table('hasProducts')->where('product_id', $id)->get();
        $count = $data->count();
        $sum = $data->sum('quantity');
        return [
            "data" => $data,
            "count" => $count,
            "total quantity"=>$sum
        ];
    }

    function getProductsByWarehouseId($id)
    {
        $data = DB::table('hasProducts')->where('warehouse_id', $id)->get();
        $sum = $data->sum('quantity');
        return [
            "data" => $data,
            "total quantity"=>$sum
        ];
    }
}
