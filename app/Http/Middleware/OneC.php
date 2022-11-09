<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class OneC
{
    use ApiResponse;

    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Secret') == config('1c')['SECRET-KEY']) {
            return $next($request);
        }
        return $this->notAccess();
    }
}
