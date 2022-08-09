@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили Пользователя</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользователя #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил Пользователя подробнее">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

<x-dashboard.photo-gallery :photos="$model->user_car_photos" />


@endsection