<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\UserCar;
use Illuminate\Http\Request;

class UserCarController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.pages.user-car.index');
    }

    public function show($id, Request $request)
    {
        $model = UserCar::findOrFail($id);
        return view('dashboard.pages.user-car.show', compact('model'));
    }

    public function delete($id)
    {
        UserCar::findOrFail($id)->delete();
        return back()->with('success', "$id Успешно удалено!");
    }
}
