<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Contracts\ArticleServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class ArticleController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.article.index');
    }

    public function show($id)
    {
        $model = Article::findOrFail($id);
        return view('dashboard.pages.article.show', compact('model'));
    }
    public function edit($id)
    {
        $model = Article::findOrFail($id);
        return view('dashboard.pages.article.edit', compact('model'));
    }
    public function create()
    {
        $model = new Article();
        return view('dashboard.pages.article.create', compact('model'));
    }
    public function store(Request $request, ArticleServiceInterface $articleService)
    {
        $result = $articleService->store($request);
        return redirect()->route('article.show', $result->id)->with('success', 'Успешно создано!');
    }
    public function update($id, Request $request, ArticleServiceInterface $articleService)
    {
        $result = $articleService->update($id, $request);
        return redirect()->route('article.show', $id)->with('success', 'Успешно обновлено!');
    }
    public function delete($id)
    {
        try {
            Article::findOrFail($id)->delete();
        } catch (Throwable  $e) {
            return back()->with('not-allowed', "Эта информация не может быть удалена: $id. Потому что к нему прикреплены данные.");
        }
        return redirect()->route('article')->with('success', "Успешно удалено: $id!");
    }
}
