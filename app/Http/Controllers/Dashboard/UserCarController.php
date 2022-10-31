<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\UserCar;
use App\Services\Contracts\CarServiceInterface;
use App\Services\Contracts\UserCarServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class UserCarController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.user-car.index');
    }

    public function list(Request $request, UserCarServiceInterface $service)
    {
        return $service->list($request);
    }

    public function show($id)
    {
        $model = UserCar::findOrFail($id);
        return view('dashboard.pages.user-car.show', compact('model'));
    }

    public function create()
    {
        $model = new UserCar;
        return view('dashboard.pages.user-car.create', compact('model'));
    }

    public function store(Request $request, UserCarServiceInterface $userCarService)
    {
        $result = $userCarService->store($request);
        if ($result['status']) {
            return redirect()->route('user-car')->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message']);
    }

    public function edit($id)
    {
        $model = UserCar::findOrFail($id);
        return view('dashboard.pages.user-car.edit', compact('model'));
    }

    public function update($id, Request $request, UserCarServiceInterface $userCarService)
    {
        $result = $userCarService->update($id, $request);
        if ($result['status']) {
            return redirect()->route('user-car.show', $id)->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message']);
    }

    public function delete($id, CarServiceInterface $service)
    {
        try {
            $service->delete($id);
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('user-car')->with('success', "Авто в статусе удаленно: $id!");
    }
}
