<?php

namespace App\Services;

use App\Models\TechCenter;
use App\Services\Contracts\TechCenterServiceInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

class TechCenterService implements TechCenterServiceInterface
{
  public $class;
  public $request;

  public function __construct($class = null, $request = null)
  {
    if ($request == null) {
      $this->request = request();
    } else {
      $this->request = $request;
    }
    if ($class == null) {
      $this->class = TechCenter::class;
    } else {
      $this->class = $class;
    }
  }

  public function filter()
  {
    $order = requestOrder();
    return $this->class::where(function ($query) {
      if ($this->request->title != null) {
        $query->where('title', 'like', '%' . $this->request->title . '%');
      }
      if ($this->request->phone != null) {
        $query->where('phone', 'like', '%' . $this->request->phone . '%');
      }
      if ($this->request->address != null) {
        $query->where('address', 'like', '%' . $this->request->address . '%');
      }
      if ($this->request->url != null) {
        $query->where('url', 'like', '%' . $this->request->url . '%');
      }
      if ($this->request->lat != null) {
        $query->where('lat', 'like', '%' . $this->request->lat . '%');
      }
      if ($this->request->lng != null) {
        $query->where('lng', 'like', '%' . $this->request->lng . '%');
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
    $avatar = null;
    try {
      $model =  $this->class::create(
        array_merge(
          $request->only(
            "title",
            "phone",
            "address",
            "lat",
            "lng",
            "emails",
          ),
          ['id' => $this->class::nextID()]
        )
      );

        $nicknamesArray = explode(', ', $request->nicknames);

        $filteredNicknames = array_filter($nicknamesArray, function ($nickname) {
            return strpos($nickname, '@') !== 0;
        });

        $model->nicknames()->createMany(
            array_map(function ($nickname) {
                return ['nickname' => $nickname];
            }, $filteredNicknames)
        );

        dd($model->nicknames);

      return ['status' => true, 'message' => "Успешно создано!"];
    } catch (Throwable $e) {
      return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
    }
  }

  public function update($id, $request)
  {
    try {
      $this->class::where('id', $id)->update(
        $request->only(
          "title",
          "phone",
          "address",
          "url",
          "lat",
          "lng",
          "emails",
        ),
      );
      return ['status' => true, 'message' => "Успешно обновлено: $id"];
    } catch (Throwable $e) {
      return ['status' => false, 'message' => 'Что-то пошло не так: ' . $e->getMessage()];
    }
  }
}
