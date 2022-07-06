<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function getAllCategories(Category $cat){
        return $cat->all();
    }

    function getCategoryById(Category $cat,Request $req){
        return $cat->findOrFail($req->route('id'));
    }
    
    function deleteCategory(Category $cat,Request $req){
        if(!$cat->find($req->route('id'))){
        return [
            'status' => 'failed',
            'message' => "user doesn't exist"
        ];
        }
        else{
            $cat->destroy($req->route('id'));
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createCategory(Category $cat, Request $req){
        return 'test';
    }

    function updateCategory(Category $cat, Request $req){
        return 'test';
    }
}
