<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = array();
        if ($request->header('token') != config('app.api_token')) {
            $response['status'] = 400;
            $response['message'] = 'Token not Match';
            $response['errors'] = '';
            return response()->json($response,400);
        }else {
            return $next($request);    
        }

        
    }
}
