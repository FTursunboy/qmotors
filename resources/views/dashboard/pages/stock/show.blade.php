@extends('dashboard.layouts.default')

@section('title', 'Акции')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/stock">Акции</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Акция #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Акция подробнее">
  <x-dashboard.stock-show :model="$model" />
</x-dashboard.panel>


@endsection