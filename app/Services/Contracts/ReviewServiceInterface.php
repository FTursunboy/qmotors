<?php

namespace App\Services\Contracts;

interface ReviewServiceInterface
{
  public function store($request);
  public function update($id, $request);
}
