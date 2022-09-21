<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use App\Services\Contracts\ReminderServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class ReminderController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.reminder.index');
    }
    public function create()
    {
        $model = new Reminder();
        return view('dashboard.pages.reminder.create', compact('model'));
    }
    public function store(Request $request, ReminderServiceInterface $reminderService)
    {
        $result = $reminderService->store($request);
        return redirect()->route('reminder.show', $result->id)->with('success', 'Успешно создано!');
    }
    public function show($id)
    {
        $model = Reminder::findOrFail($id);
        return view('dashboard.pages.reminder.show', compact('model'));
    }
    public function edit($id)
    {
        $model = Reminder::findOrFail($id);
        return view('dashboard.pages.reminder.edit', compact('model'));
    }
    public function update($id, Request $request, ReminderServiceInterface $reminderService)
    {
        $result = $reminderService->update($id, $request);
        // if ($result['status']) {
        return redirect()->route('reminder.show', $id)->with('success', "Успешно обновлено: $id!");
        // }
        // return back()->with('not-allowed', $result['message'])->withInput();
    }
    public function delete($id)
    {
        try {
            Reminder::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('reminder')->with('success', "Успешно удалено: $id!");
    }
}
