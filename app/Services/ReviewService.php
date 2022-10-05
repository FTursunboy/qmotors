<?php

namespace App\Services;

use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use App\Models\TechCenter;
use App\Services\Contracts\ReviewServiceInterface;

class ReviewService implements ReviewServiceInterface
{
  public $class;
  public $request;
  public function __construct()
  {
    $this->class = Review::class;
    $this->request = request();
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      $query->where('moderated', true);
      if ($this->request->comment != null) {
        $query->where('comment', 'ilike', '%' . $this->request->comment . '%');
      }
      if ($this->request->order_id != null) {
        $query->where('order_id', $this->request->order_id);
      }
      if ($this->request->moderated != null) {
        $query->where('moderated', $this->request->moderated);
      }
      if ($this->request->rating_start != null) {
        $query->where('rating', '>=', $this->request->rating_start);
      }
      if ($this->request->rating_end != null) {
        $query->where('rating', '<=', $this->request->rating_end);
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
      $request->only('rating', 'comment', 'order_id'),
      [
        'id' => $this->class::nextID(),
        'moderated' => false
      ]
    ));
    return $model;
  }

  public function update($id, $request)
  {
    $model = $this->class::findOrFail($id);
    $model->update(
      $request->only('rating', 'comment', 'order_id', 'moderated'),
    );
    return $model;
  }

  public function list($request)
  {
    $result = TechCenter::with('reviews')->has('reviews')->where(function ($query) use ($request) {
      if ($request->tech_center_id) {
        $query->where('id', $request->tech_center_id);
      }
    })->get();
    return $result;
  }
}
