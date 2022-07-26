<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechCenter\StoreTechCenterRequest;
use App\Models\TechCenter;
use App\Services\Contracts\TechCenterServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class TechCenterController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.pages.tech-center.index');
    }

    public function show($id)
    {
        $model = TechCenter::findOrFail($id);
        return view('dashboard.pages.tech-center.show', compact('model'));
    }

    public function create()
    {
        $model = new TechCenter();
        return view('dashboard.pages.tech-center.create', compact('model'));
    }

    public function edit($id)
    {
        $model = TechCenter::findOrFail($id);
        return view('dashboard.pages.tech-center.edit', compact('model'));
    }

    public function store(Request $request, TechCenterServiceInterface $techCenterService)
    {
        $result = $techCenterService->store($request);
        if ($result['status']) {
            return redirect()->route('tech-center')->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message'])->withInput();
    }

    public function update($id, Request $request, TechCenterServiceInterface $techCenterService)
    {
        $result = $techCenterService->update($id, $request);
        if ($result['status']) {
            return redirect()->route('tech-center', $id)->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message'])->withInput();
    }

    public function delete($id)
    {
        try {
            TechCenter::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('tech-center')->with('success', "Успешно удалено: $id!");
    }
}
