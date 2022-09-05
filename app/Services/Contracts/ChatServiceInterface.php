<?php

namespace App\Services\Contracts;

interface ChatServiceInterface
{
    public function messages($id = null);
    public function message($request, $id = null, $is_admin = false);
}
