<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function getAllProducts(Product $product)
    {
        return $product->with('category')->get();

    }
    
    function getProductById(Product $product,$id){
        return $product->with('category')->where('id','=',$id)->get();
    }

    function getAllProductsByWarehouse(Product $product, $id)
    {
        return $product->allWarehouse->where('warehouse_id','=',$id)->get();

    }

    function deleteProduct(Product $product, $id)
    {
        if (!$product->where('id','=',$id)) {
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
        return 'test';
    }

    function updateProduct(Product $product, Request $req)
    {
        return 'test';
    }
}
