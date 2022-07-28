@extends('dashboard.layouts.default')

@section('title', 'Закаы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Закаы</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Заказ #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Заказ подробнее">
  <x-dashboard.order-show :model="$model" />
</x-dashboard.panel>


@endsection