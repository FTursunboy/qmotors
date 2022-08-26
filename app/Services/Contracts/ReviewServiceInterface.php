<?php

namespace App\Services\Contracts;

interface ReviewServiceInterface
{
  public function store($request);
  public function list($request);
  public function update($id, $request);
}
