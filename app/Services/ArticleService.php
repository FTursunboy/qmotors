<?php

namespace App\Services;

use App\Models\Article;
use App\Services\Contracts\ArticleServiceInterface;

class ArticleService implements ArticleServiceInterface
{
  public $class;
  public $request;
  public function __construct()
  {
    $this->class = Article::class;
    $this->request = request();
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if ($this->request->title != null) {
        $query->where('title', 'ilike', '%' . $this->request->title . '%');
      }
      if ($this->request->subtitle != null) {
        $query->where('subtitle', 'ilike', '%' . $this->request->subtitle . '%');
      }
      if ($this->request->text != null) {
        $query->where('text', 'ilike', '%' . $this->request->text . '%');
      }
      if ($this->request->created_at_start != null) {
        $query->whereDate('created_at', '>=', $this->request->created_at_start);
      }
      if ($this->request->created_at_end != null) {
        $query->whereDate('created_at', '<=', $this->request->created_at_end);
      }
      if ($this->request->updated_at_start != null) {
        $query->whereDate('updated_at', '>=', $this->request->updated_at_start);
      }
      if ($this->request->updated_at_end != null) {
        $query->whereDate('updated_at', '<=', $this->request->updated_at_end);
      }
    })
      ->orderBy($order['key'], $order['value'])
      ->paginate($this->request->get('per_page', 20));
  }

  public function store($request)
  {
    // dd($request->all());
    $preview = null;
    if ($request->file('preview') != null) {
      $preview = uploadImage($request->file('preview'), 'article');
    }
    $model = $this->class::create(array_merge(
      $request->only('title', 'subtitle', 'text'),
      [
        'id' => $this->class::nextID(),
        'preview' => $preview
      ]
    ));
    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $preview = $model->preview;
    if ($request->preview != null) {
      $preview = uploadImage($request->file('preview'), 'user', $preview);
    }
    $model->update(array_merge(
      $request->only('title', 'subtitle', 'text'),
      [
        'preview' => $preview
      ]
    ));
    return $model;
  }
}
