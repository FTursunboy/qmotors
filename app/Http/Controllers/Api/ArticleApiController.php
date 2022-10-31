<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Traits\ApiResponse;

class ArticleApiController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->success(Article::exclude('text')->latest()->get()->append('preview_path'));
    }

    public function show($id)
    {
        return $this->success(Article::find($id)->append('preview_path'));
    }
}
