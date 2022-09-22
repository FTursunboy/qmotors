<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
  public function filter();
  public function list($request);
  public function store($request);
  public function update($id, $request);
  public function updateApi($request);
}
