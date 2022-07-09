<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\EmployeeType;

class EmployeeTypeExists
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
        error_log('inside in the middleware'.$request);
        $checkIfExists = EmployeeType::where('id',$request->employee_type_id)->exists();
        error_log('result'.$checkIfExists);
        if(!$checkIfExists)
            return response([
                'status'=>'failed',
                'message'=>'employee type doesn\'t exist'
            ]);  
        return $next($request);
    }
}
