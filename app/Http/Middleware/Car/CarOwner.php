<?php

namespace App\Http\Middleware\Car;

use App\Models\UserCar;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarOwner
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (UserCar::findOrFail($request->id)->user_id == auth()->id())
            return $next($request);
        return $this->notAccess();
    }
}
