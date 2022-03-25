<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyAuth
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
        $allowedKeys = ["abc","def"];
        if(!$request->has("key")|| !in_array($request->key,$allowedKeys)){
            return response()->json([
                "message"=>"no data",
                "errors"=>"key ma par buu"
            ],403);
        }
        return $next($request);
    }
}
