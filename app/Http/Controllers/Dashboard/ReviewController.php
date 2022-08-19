<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\Contracts\ReviewServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class ReviewController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.review.index');
    }

    public function show($id)
    {
        $model = Review::findOrFail($id);
        return view('dashboard.pages.review.show', compact('model'));
    }
    public function edit($id)
    {
        $model = Review::findOrFail($id);
        return view('dashboard.pages.review.edit', compact('model'));
    }
    public function update($id, Request $request, ReviewServiceInterface $reviewService)
    {
        $result = $reviewService->update($id, $request);
        // if ($result['status']) {
        return redirect()->route('review.show', $id)->with('success', "Успешно обновлено: $id!");
        // }
        // return back()->with('not-allowed', $result['message'])->withInput();
    }
    public function delete($id)
    {
        try {
            Review::findOrFail($id)->delete();
        } catch (Throwable $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('review')->with('success', "Успешно удалено: $id!");
    }
}
