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
  if ($old != null && file_exists(public_path() . $old)) {
    unlink(public_path() . $old);
  }
  $names = explode(".", $file->getClientOriginalName());
  $image = time() . '.' .  $names[count($names) - 1];
  $file->storeAs("public/$path", $image);
  return "/storage/$path/" . $image;
}
