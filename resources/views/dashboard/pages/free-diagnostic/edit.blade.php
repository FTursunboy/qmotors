@extends('dashboard.layouts.default')

@section('title', 'Безплатные диагностики')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/free-diagnostic">Безплатные диагностики</a></li>
  <li class="breadcrumb-item"><a href="/free-diagnostic/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Безплатная диагностика #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменить Безплатная диагностика">
  <form action="{{ route('free-diagnostic.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <x-dashboard.free-diagnostic-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection