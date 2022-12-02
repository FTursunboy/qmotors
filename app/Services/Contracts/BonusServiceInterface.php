<?php

namespace App\Services\Contracts;

interface BonusServiceInterface
{
    public function store($request);

    public function burn();

    public function update($id, $request);
}
