<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function requestOrder(): array
{
    $order = request()->get('order', '-id');
    if ($order[0] == '-') {
        $result = [
            'key' => substr($order, 1),
            'value' => 'desc'
        ];
    } else {
        $result = [
            'key' => $order,
            'value' => 'asc'
        ];
    }
    return $result;
}

function filterPhone($phone)
{
    return str_replace(['(', ')', ' ', '-'], '', $phone);
}

function filterPhone2($phone)
{
    $phone = str_replace('+7', '', $phone);
    return filterPhone($phone);
}

function filterPhone3($phone)
{
    $phone = str_replace('+', '', $phone);
    return filterPhone($phone);
}

function nudePhone($phone)
{
    if (strlen($phone) > 0)
        $phone = str_replace(['(', ')', ' ', '-', '+'], '', $phone);
    if (strlen($phone) > 0) {
        if ($phone[0] == '7') {
            $phone = substr($phone, 1);
        }
    }
    return $phone;
}

function buildPhone($phone): string
{
    $phone = nudePhone($phone);
    return '+7 ' . '(' . substr($phone, 0, 3) . ') '
        . substr($phone, 3, 3) . '-'
        . substr($phone, 6, 2) . '-'
        . substr($phone, 8, 2);
}

function uploadFile($file, $path, $old = null): ?string
{
    $result = null;
    deleteFile($old);
    if ($file != null) {
//        $names = explode(".", $file->getOrinalExtension());
        $model = floor(microtime(true) * 1000) . '.' . $file->extension();
        $file->storeAs("public/$path", $model);
        $result = "/storage/$path/" . $model;
    }
    return $result;
}

function deleteFile($path)
{
    if ($path != null && file_exists(public_path() . $path)) {
        unlink(public_path() . $path);
    }
}

function customAsset($model, $field)
{
    if ($model->$field) {
        if (str_contains($model->$field, 'storage')) {
            return asset($model->$field);
        } elseif (str_contains($model->$field, 'http')) {
            return $model->$field;
        }
        return asset('storage/uploads/' . Str::singular($model->getTable()) . "/$field/" . $model->id . '/' . $model->$field);
    }
    return $model->$field;
}

function localDatetime($date, $timezone = 'Europe/Moscow')
{
    if ($date)
        $date = Carbon::parse($date)->setTimezone($timezone)->format('Y-m-d H:i:s');
    return $date;
}
