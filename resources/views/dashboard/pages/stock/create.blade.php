@extends('dashboard.layouts.default')

@section('title', 'Акция')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Акции</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Акция</h1>
<!-- end page-header -->

<x-dashboard.panel title="Акция">
  <form action="{{ route('stock.store') }}" method="POST">
    @csrf
    <x-dashboard.stock-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection