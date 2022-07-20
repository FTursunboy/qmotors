<?php

namespace App\Services\Contracts;

interface UserCarServiceInterface
{
  public function filter();
  public function update($id, $request);
}
