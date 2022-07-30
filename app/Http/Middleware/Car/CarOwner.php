<?php

namespace App\Http\Middleware\Car;

use App\Models\UserCar;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class CarOwner
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (UserCar::findOrFail($request->id)->user_id == auth()->id())
            return $next($request);
        return $this->notAccess();
    }
}
