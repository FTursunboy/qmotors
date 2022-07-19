@extends('dashboard.layouts.default')

@section('title', 'Автомобили Ползавателя')

@section('content')

<!-- begin page-header -->
<h1 class="page-header">Автомобил Ползавателя #{{ $model->id }}</h1>
<!-- end page-header -->
<x-dashboard.panel title="Автомобил Ползавателя подробнее">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

@endsection