<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Contracts\OrderServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.order.index');
    }
    public function create()
    {
        $model = new Order();
        return view('dashboard.pages.order.create', compact('model'));
    }
    public function store(Request $request, OrderServiceInterface $orderService)
    {
        $result = $orderService->store($request);
        return redirect()->route('order.show', $result->id)->with('success', 'Успешно создано!');
    }
    public function show($id)
    {
        $model = Order::findOrFail($id);
        return view('dashboard.pages.order.show', compact('model'));
    }
    public function edit($id)
    {
        $model = Order::findOrFail($id);
        return view('dashboard.pages.order.edit', compact('model'));
    }
    public function update($id, Request $request, OrderServiceInterface $orderService)
    {
        $result = $orderService->update($id, $request);
        if ($result['status']) {
            return redirect()->route('order.show', $id)->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message'])->withInput();
    }
    public function delete($id)
    {
        try {
            Order::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('order')->with('success', "Успешно удалено: $id!");
    }
}
