<?php

namespace App\Http\Middleware\Order;

use App\Models\Order;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class OrderOwner
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
        if (optional(Order::findOrFail($request->id)->user_car)->user_id == auth()->id())
            return $next($request);
        return $this->error(['message' => 'У вас нет доступа!'], 403);
    }
}
