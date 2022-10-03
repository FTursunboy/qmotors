@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользователья')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили Пользователья</a></li>
  <li class="breadcrumb-item"><a href="/user-car/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользователья #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил Пользователья Изменить">
  <form action="{{ route('user-car.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <x-dashboard.user-car-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection