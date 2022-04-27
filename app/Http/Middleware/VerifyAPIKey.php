<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAPIKey
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

        // define api key
        $api_keys = ['1111111', '2222222', '3333333'];

        if ($request->header('Authorization'))
        {
            // get api key from header
            $api_key = $request->header('Authorization');
            if (!in_array($api_key, $api_keys))
            {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $next($request);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
