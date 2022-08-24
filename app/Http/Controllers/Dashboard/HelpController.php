<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Services\Contracts\HelpServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class HelpController extends Controller
{
    public function index()
    {
        $model = Help::findOrNew(1);
        return view('dashboard.pages.help.index', compact('model'));
    }
    public function update(Request $request, HelpServiceInterface $helpService)
    {
        $helpService->update($request);
        return back()->with('success', 'Успешно обновлено!');
    }
}
