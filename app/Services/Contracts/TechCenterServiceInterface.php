<?php

namespace App\Services\Contracts;

interface TechCenterServiceInterface
{
  public function filter();
  public function store($request);
  public function update($id, $request);
}
