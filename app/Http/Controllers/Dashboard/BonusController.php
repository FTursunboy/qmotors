<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bonus\StoreBonusRequest;
use App\Models\Bonus;
use App\Services\Contracts\BonusServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class BonusController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.bonus.index');
    }

    public function show($id)
    {
        $model = Bonus::findOrFail($id);
        return view('dashboard.pages.bonus.show', compact('model'));
    }
    public function create()
    {
        $model = new Bonus();
        return view('dashboard.pages.bonus.create', compact('model'));
    }

    public function store(StoreBonusRequest $request, BonusServiceInterface $bonusService)
    {
        try {
            $result = $bonusService->store($request);
            return redirect()->route('bonus')->with('success', 'Успешно добавлено: ' . $result->id . '!');
        } catch (Throwable $e) {
            return back()->with('not-allowed', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $model = Bonus::findOrFail($id);
        return view('dashboard.pages.bonus.edit', compact('model'));
    }
    public function update($id, Request $request, BonusServiceInterface $bonusService)
    {
        $result = $bonusService->update($id, $request);
        // if ($result['status']) {
        return redirect()->route('bonus.show', $id)->with('success', "Успешно обновлено: $id!");
        // }
        // return back()->with('not-allowed', $result['message'])->withInput();
    }
    public function delete($id)
    {
        try {
            Bonus::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('bonus')->with('success', "Успешно удалено: $id!");
    }
}
