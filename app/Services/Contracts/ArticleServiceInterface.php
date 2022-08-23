<?php

namespace App\Services\Contracts;

interface ArticleServiceInterface
{
  public function store($request);
  public function update($id, $request);
}
