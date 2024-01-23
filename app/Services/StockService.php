<?php

namespace App\Services;

use App\Jobs\ProcessPushNotification;
use App\Models\Stock;
use App\Services\Contracts\StockServiceInterface;

class StockService implements StockServiceInterface
{
  public $class;
  public $request;
  public function __construct()
  {
    $this->class = Stock::class;
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
      if ($this->request->description != null) {
        $query->where('description', 'ilike', '%' . $this->request->description . '%');
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
    $model = $this->class::create(array_merge(
      $request->only('title', 'subtitle', 'text', 'description'),
      [
        'id' => $this->class::nextID()
      ]
    ));

    ProcessPushNotification::dispatch(
      $request->collect(),
      $model,
      ['title' => 'Новая акция', 'body' => $request->title]
    );

    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $model->update($request->only('title', 'subtitle', 'text', 'description'));
    return $model;
  }
}
