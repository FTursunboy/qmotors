@extends('dashboard.layouts.default')

@section('title', 'Уведомление')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/notification">Уведомление</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Увидомление #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Увидомление подробнее">
  <x-dashboard.notification-show :model="$model" />
</x-dashboard.panel>


@endsection