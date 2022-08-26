<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FreeDiagnostic;
use App\Services\Contracts\FreeDiagnosticServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class FreeDiagnosticController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.free-diagnostic.index');
    }

    public function show($id)
    {
        $model = FreeDiagnostic::findOrFail($id);
        return view('dashboard.pages.free-diagnostic.show', compact('model'));
    }
    public function edit($id)
    {
        $model = FreeDiagnostic::findOrFail($id);
        return view('dashboard.pages.free-diagnostic.edit', compact('model'));
    }
    public function create()
    {
        $model = new FreeDiagnostic();
        return view('dashboard.pages.free-diagnostic.create', compact('model'));
    }
    public function store(Request $request, FreeDiagnosticServiceInterface $freeDiagnosticService)
    {
        $result = $freeDiagnosticService->store($request);
        return redirect()->route('free-diagnostic.show', $result->id)->with('success', 'Успешно создано!');
    }
    public function update($id, Request $request, FreeDiagnosticServiceInterface $freeDiagnosticService)
    {
        $result = $freeDiagnosticService->update($id, $request);
        return redirect()->route('free-diagnostic.show', $id)->with('success', 'Успешно обновлено!');
    }
    public function delete($id)
    {
        try {
            FreeDiagnostic::findOrFail($id)->delete();
        } catch (Throwable  $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('free-diagnostic')->with('success', "Успешно удалено: $id!");
    }
}
