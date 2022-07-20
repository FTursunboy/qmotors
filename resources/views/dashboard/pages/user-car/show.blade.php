@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользавателя')

@section('content')

<!-- begin page-header -->
<h1 class="page-header">Автомобил Пользавателя #{{ $model->id }}</h1>
<!-- end page-header -->
<x-dashboard.panel title="Автомобил Пользавателя подробнее">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

@endsection