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
