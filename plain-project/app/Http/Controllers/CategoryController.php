<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function getAllCategories(Category $cat)
    {
        return $cat->with('getAllProducts')->get();
    }

    function getCategoryById(Category $cat, $id)
    {
        return $cat->with('getAllProducts')->where('id', '=', $id)->get();
    }

    function deleteCategory(Category $cat, $id)
    {
        if (!$cat->where('id', '=', $id)) {
            return [
                'status' => 'failed',
                'message' => "category doesn't exist"
            ];
        } else {
            $cat->destroy($id);
            return [
                'status' => 'successful',
                'message' => 'deleted successfully'
            ];
        }
    }

    function createCategory(Category $cat, Request $req)
    {
        Category::create(array_merge([
            "category_name" => $req->category_name,
        ]));

        return $req;
    }

    function updateCategory(Category $cat, Request $req, $id)
    {
        Category::where('id','=',$id)->update(array_merge([
            "category_name" => $req->category_name,
        ]));
        
        return $req;
    }
}
