@extends('dashboard.layouts.default')

@section('title', 'Автомобили пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Автомобили пользователя</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобил пользователя</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автомобил пользователя Создать">
  <form action="{{ route('user-car.store') }}" method="POST">
    @csrf
    <x-dashboard.user-car-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection