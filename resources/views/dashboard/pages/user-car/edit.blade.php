@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили Пользователя</a></li>
  <li class="breadcrumb-item"><a href="/user-car/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользователя #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил Пользователя Изменить">
  <x-dashboard.user-car-form :model="$model" />
</x-dashboard.panel>

@endsection