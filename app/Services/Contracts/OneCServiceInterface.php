<?php

namespace App\Services\Contracts;

interface OneCServiceInterface
{
    public function registerUser($model);
    public function updateUser($model);
    public function car($model);
}
