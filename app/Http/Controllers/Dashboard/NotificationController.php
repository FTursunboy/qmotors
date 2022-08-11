<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\Contracts\NotificationServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class NotificationController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.notification.index');
    }

    public function show($id)
    {
        $model = Notification::findOrFail($id);
        return view('dashboard.pages.notification.show', compact('model'));
    }
    public function edit($id)
    {
        $model = Notification::findOrFail($id);
        return view('dashboard.pages.notification.edit', compact('model'));
    }
    public function update($id, Request $request, NotificationServiceInterface $notificationService)
    {
        $result = $notificationService->update($id, $request);
        if ($result['status']) {
            return redirect()->route('notification.show', $id)->with('success', $result['message']);
        }
        return back()->with('not-allowed', $result['message'])->withInput();
    }
    public function delete($id)
    {
        try {
            Notification::findOrFail($id)->delete();
        } catch (Throwable  $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('order')->with('success', "Успешно удалено: $id!");
    }
}
