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
            return redirect()->route('order', $id)->with('success', $result['message']);
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
