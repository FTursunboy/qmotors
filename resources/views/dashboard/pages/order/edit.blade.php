@extends('dashboard.layouts.default')

@section('title', 'Заказы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/order">Заказы</a></li>
  <li class="breadcrumb-item"><a href="/order/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Заказ #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменить Заказ">
  <form action="{{ route('order.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <x-dashboard.order-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection