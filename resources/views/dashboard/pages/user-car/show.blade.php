@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользователья')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили Пользователья</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользователья #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил Пользователья подробнее">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

<x-dashboard.photo-gallery :photos="$model->user_car_photos" />


@endsection