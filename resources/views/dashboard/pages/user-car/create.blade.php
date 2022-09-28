@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили Пользователя</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользователя</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил Пользователя Создать">
  <form action="{{ route('user-car.store') }}" method="POST">
    @csrf
    <x-dashboard.user-car-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection