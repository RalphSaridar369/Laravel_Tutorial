<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseExists
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
        $checkIfExists = Warehouse::where('id',$request->warehouse_id)->exists();
        error_log('result' . $checkIfExists);
        if (!$checkIfExists)
            return response([
                'status' => 'failed',
                'message' => 'warehouse doesn\'t exist'
            ]);
        return $next($request);
    }
}
