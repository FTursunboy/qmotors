@extends('dashboard.layouts.default')

@section('title', 'Техцентр')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/tech-center">Техцентры</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Техцентр #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Техцентр подробнее">
  <x-dashboard.tech-center-show :model="$model" />
</x-dashboard.panel>


@endsection