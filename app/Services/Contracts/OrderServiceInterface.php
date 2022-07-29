<?php

namespace App\Services\Contracts;

interface OrderServiceInterface
{
  public function store($request);
  public function photo($id, $request);
  public function history($request);
  public function update($id, $request);
}
