@extends('dashboard.layouts.default')

@section('title', 'Изменит Акция')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/stock">Акции</a></li>
  <li class="breadcrumb-item"><a href="/stock/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Акция #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Акция">
  <form action="{{ route('stock.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.stock-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection