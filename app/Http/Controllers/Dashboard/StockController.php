<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Services\Contracts\StockServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class StockController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.stock.index');
    }

    public function show($id)
    {
        $model = Stock::findOrFail($id);
        return view('dashboard.pages.stock.show', compact('model'));
    }
    public function edit($id)
    {
        $model = Stock::findOrFail($id);
        return view('dashboard.pages.stock.edit', compact('model'));
    }
    public function create()
    {
        $model = new Stock();
        return view('dashboard.pages.stock.create', compact('model'));
    }
    public function store(Request $request, StockServiceInterface $stockService)
    {
        $result = $stockService->store($request);
        return redirect()->route('stock.show', $result->id)->with('success', 'Успешно создано!');
    }
    public function update($id, Request $request, StockServiceInterface $stockService)
    {
        $result = $stockService->update($id, $request);
        return redirect()->route('stock.show', $id)->with('success', 'Успешно обновлено!');
    }
    public function delete($id)
    {
        try {
            Stock::findOrFail($id)->delete();
        } catch (Throwable  $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('stock')->with('success', "Успешно удалено: $id!");
    }
}
