@extends('dashboard.layouts.default')

@section('title', 'Автомобили пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили пользователя</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобиль пользователья #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил Пользователья подробнее">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

<x-dashboard.photo-gallery :photos="$model->user_car_photos" />


@endsection