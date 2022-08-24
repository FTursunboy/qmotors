<?php

namespace App\Services;

use App\Models\Help;
use App\Services\Contracts\HelpServiceInterface;

class HelpService implements HelpServiceInterface
{
  public $class;
  public $request;
  public function __construct()
  {
    $this->class = Help::class;
    $this->request = request();
  }

  public function update($request)
  {
    $model = $this->class::findOrNew(1);
    $model->update($request->only('title', 'subtitle', 'text'));
    return $model;
  }
}
