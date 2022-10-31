<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.user.index');
    }

    public function list(Request $request, UserServiceInterface $service)
    {
        return $service->list($request);
    }

    public function pushToken()
    {
        return view('dashboard.pages.user.push-token');
    }

    public function firebaseLog()
    {
        return view('dashboard.pages.user.firebase-log');
    }

    public function oneCLog()
    {
        return view('dashboard.pages.user.one-c-log');
    }

    public function show($id)
    {
        $model = User::findOrFail($id);
        return view('dashboard.pages.user.show', compact('model'));
    }

    public function create()
    {
        $model = new User;
        return view('dashboard.pages.user.create', compact('model'));
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('dashboard.pages.user.edit', compact('model'));
    }

    public function store(StoreUserRequest $request, UserServiceInterface $userService)
    {
        $result = $userService->store($request);
        if ($result['status']) {
            return redirect()->route('user')->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message'])->withInput();
    }

    public function update($id, Request $request, UserServiceInterface $userService)
    {
        $result = $userService->update($id, $request);
        if ($result['status']) {
            return redirect()->route('user', $id)->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message'])->withInput();
    }

    public function delete($id, UserServiceInterface $service)
    {
        // $service->delete($id);
        // try {
        $service->delete($id);
        // } catch (Throwable $e) {
        //     return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        // }
        return redirect()->route('user')->with('success', "Успешно удалено: $id!");
    }
}
