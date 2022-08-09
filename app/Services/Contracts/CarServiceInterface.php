<?php

namespace App\Services\Contracts;

interface CarServiceInterface
{
  public function store($request);
  public function update($id, $request);
  public function modelList($request);
  public function photo($id, $request);
  public function photoDelete($id);
}
