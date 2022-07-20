@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользавателя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили Пользавателя</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользавателя #{{ $model->id }}</h1>
<!-- end page-header -->
<x-dashboard.panel title="Автомобил Пользавателя подробнее">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

@endsection