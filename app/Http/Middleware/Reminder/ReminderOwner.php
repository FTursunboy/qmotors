<?php

namespace App\Http\Middleware\Reminder;

use App\Models\Reminder;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReminderOwner
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
        $id = $request->route()->parameter('id');
        if (Reminder::where('id', $id)->whereHas('user_car', function ($query) {
            $query->where('user_id', auth()->id());
        })->exists())
            return $next($request);

        return $this->notAccess();
    }
}
