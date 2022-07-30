<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reminder\StoreReminderRequest;
use App\Http\Requests\Reminder\UpdateReminderRequest;
use App\Models\Reminder;
use App\Services\Contracts\ReminderServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReminderApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $result = Reminder::with('user_car')->whereHas('user_car', function ($query) {
            $query->where('user_id', auth()->id());
        })->latest('id')->get();
        return $this->success($result);
    }

    public function store(StoreReminderRequest $request, ReminderServiceInterface $reminderService)
    {
        return  $this->success($reminderService->store($request));
    }

    public function update($id, UpdateReminderRequest $request, ReminderServiceInterface $reminderService)
    {
        return  $this->success($reminderService->update($id, $request));
    }

    public function show($id, UpdateReminderRequest $request)
    {
        return $this->success(Reminder::with('user_car')->findOrFail($id));
    }

    public function destroy($id)
    {
        return $this->success(Reminder::destroy([$id]));
    }
}
