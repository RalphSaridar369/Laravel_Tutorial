<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //validators

    function validateCreateAndUpdate()
    {
        return Validator::make(request()->all(),[
            "category_name" => "required | string | min:8"
        ]);
    }

    //calls

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
        $checkForErrors = $this->validateCreateAndUpdate();
        if($checkForErrors->fails()){
            return $checkForErrors->errors();
        }
        Category::create(array_merge([
            "category_name" => $req->category_name,
        ]));

        return $req;
    }

    function updateCategory(Category $cat, Request $req, $id)
    {
        $checkForErrors = $this->validateCreateAndUpdate();
        if($checkForErrors->fails()){
            return $checkForErrors->errors();
        }
        Category::where('id','=',$id)->update(array_merge([
            "category_name" => $req->category_name,
        ]));
        
        return $req;
    }
}
