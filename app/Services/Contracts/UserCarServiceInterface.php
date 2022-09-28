<?php

namespace App\Services\Contracts;

interface UserCarServiceInterface
{
  public function filter();
  public function list($request);
  public function store($request);
  public function update($id, $request);
}
