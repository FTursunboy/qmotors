@extends('dashboard.layouts.default')

@section('title', 'Заказы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/order">Заказы</a></li>
  <li class="breadcrumb-item"><a href="/order/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Заказ #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменить Заказ">
  <x-dashboard.user-car-form :model="$model" />
</x-dashboard.panel>

@endsection