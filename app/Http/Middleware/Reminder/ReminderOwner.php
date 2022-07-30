<?php

namespace App\Http\Middleware\Reminder;

use App\Models\Reminder;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class ReminderOwner
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
        $id = $request->route()->parameter('id');
        if (Reminder::where('id', $id)->whereHas('user_car', function ($query) {
            $query->where('user_id', auth()->id());
        })->exists())
            return $next($request);

        return $this->notAccess();
    }
}
