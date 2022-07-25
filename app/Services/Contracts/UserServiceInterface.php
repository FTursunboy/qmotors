<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
  public function filter();
  public function store($request);
  public function update($id, $request);
}
