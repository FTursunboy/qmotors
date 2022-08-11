@extends('dashboard.layouts.default')

@section('title', 'Бонусы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/bonus">Бонусы</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Бонус #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Бонус подробнее">
  <x-dashboard.bonus-show :model="$model" />
</x-dashboard.panel>


@endsection