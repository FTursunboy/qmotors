<?php

namespace App\Services\Contracts;

interface FreeDiagnosticServiceInterface
{
  public function store($request);
  public function update($id, $request);
  public function history($request);
}
