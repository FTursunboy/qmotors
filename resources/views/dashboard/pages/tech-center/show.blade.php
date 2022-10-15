@extends('dashboard.layouts.default')

@section('title', 'Автосервис')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/tech-center">Автосервисы</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автосервис #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автосервис подробнее">
  <x-dashboard.tech-center-show :model="$model" />
</x-dashboard.panel>


@endsection