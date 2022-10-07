@extends('dashboard.layouts.default')

@section('title', 'Автомобили пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили пользователя</a></li>
  <li class="breadcrumb-item"><a href="/user-car/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил пользователя #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил пользователя Изменить">
  <form action="{{ route('user-car.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <x-dashboard.user-car-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection