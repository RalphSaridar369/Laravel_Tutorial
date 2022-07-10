<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        error_log('inside in the middleware' . $request);
        error_log('Category A' === $request->category_name);
        $checkIfExists = Category::where('category_name',$request->category_name)->exists();
        if ($checkIfExists)
            return response([
                'status' => 'failed',
                'message' => 'category already exists'
            ]);
        return $next($request);
    }

}
