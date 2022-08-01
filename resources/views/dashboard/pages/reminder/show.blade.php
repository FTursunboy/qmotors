@extends('dashboard.layouts.default')

@section('title', 'Напоминания')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Напоминания</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Напоминание #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Напоминание подробнее">
  <x-dashboard.reminder-show :model="$model" />
</x-dashboard.panel>


@endsection