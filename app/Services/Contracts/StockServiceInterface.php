<?php

namespace App\Services\Contracts;

interface StockServiceInterface
{
  public function store($request);
  public function update($id, $request);
}
