@extends('dashboard.layouts.default')

@section('title', 'Заказы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Уведомления</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Заказы</h1>
<!-- end page-header -->

<x-dashboard.panel title="Заказы">
  <form action="{{ route('order.store') }}" method="POST">
    @csrf
    <x-dashboard.order-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection