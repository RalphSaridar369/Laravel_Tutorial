<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function getAllProducts(Product $product)
    {
        return $product->all();
    }
    
    function getProductById(Product $product,Request $req){
        return $product->findOrFail($req->route('id'));
    }

    function deleteProduct(Product $product, Request $req)
    {
        if (!$product->find($req->route('id'))) {
            return [
                'status' => 'failed',
                'message' => "user doesn't exist"
            ];
        } else {
            $product->destroy($req->route('id'));
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
