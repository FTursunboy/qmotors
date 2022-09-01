@extends('dashboard.layouts.default')

@section('title', 'Бесплатные диагностики')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/free-diagnostic">Бесплатные диагностики</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Бесплатная диагностика #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Бесплатная диагностика подробнее">
  <x-dashboard.free-diagnostic-show :model="$model" />
</x-dashboard.panel>

@endsection