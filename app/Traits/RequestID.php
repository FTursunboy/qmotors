<?php

namespace App\Traits;

trait RequestID
{
    public function all($keys = null): array
    {
        // Add route parameters to validation data
        return array_merge(parent::all(), ['id' => $this->route()->parameters()['id']]);
    }
}
