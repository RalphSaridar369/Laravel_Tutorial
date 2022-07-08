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
        // return $product->findOrFail($req->route('id'));
        // return $product->findOrFail($req->route('id'))->pivot->id;
        // $Product = $product->join('category','product.category id','=','category.id')
        //                    ->get(['product.*', 'category.*']);
        // return $Product;
        return $product->with('getCategory')->where('id','=',$req->route('id'))->get();
    }

    function deleteProduct(Product $product, Request $req)
    {
        if (!$product->find($req->route('id'))) {
            return [
                'status' => 'failed',
                'message' => "product doesn't exist"
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
