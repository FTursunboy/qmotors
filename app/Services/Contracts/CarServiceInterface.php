<?php

namespace App\Services\Contracts;

interface CarServiceInterface
{
  public function store($request);
  public function update($id, $request);
}
