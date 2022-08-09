<?php

function requestOrder()
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

function uploadImage($file, $path, $old = null)
{
  deletePhoto($old);
  $names = explode(".", $file->getClientOriginalName());
  $image = time() . '.' .  $names[count($names) - 1];
  $file->storeAs("public/$path", $image);
  return "/storage/$path/" . $image;
}

function deletePhoto($path)
{
  if ($path != null && file_exists(public_path() . $path)) {
    unlink(public_path() . $path);
  }
}
