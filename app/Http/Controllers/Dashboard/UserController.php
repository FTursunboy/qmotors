<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $model = User::findOrFail($id);
        return view('dashboard.pages.user.show', compact('model'));
    }
}
