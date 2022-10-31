<?php

namespace App\Http\Middleware\Order;

use App\Models\Order;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderOwner
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        if (optional(Order::findOrFail($request->id)->user_car)->user_id == auth()->id())
            return $next($request);
        return $this->notAccess();
    }
}
