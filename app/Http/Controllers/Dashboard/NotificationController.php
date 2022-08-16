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
    public function create()
    {
        $model = new Notification();
        return view('dashboard.pages.notification.create', compact('model'));
    }
    public function store(Request $request, NotificationServiceInterface $notificationService)
    {
        $result = $notificationService->store($request);
        return redirect()->route('notification.show', $result->id)->with('success', 'Успешно создано!');
    }
    public function update($id, Request $request, NotificationServiceInterface $notificationService)
    {
        $result = $notificationService->update($id, $request);
        return redirect()->route('notification.show', $id)->with('success', 'Успешно обновлено!');
    }
    public function delete($id)
    {
        try {
            Notification::findOrFail($id)->delete();
        } catch (Throwable  $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('notification')->with('success', "Успешно удалено: $id!");
    }
}
