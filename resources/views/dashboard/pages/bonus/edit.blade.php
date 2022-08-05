@extends('dashboard.layouts.default')

@section('title', 'Изменит Бонус')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/bonus">Бонусы</a></li>
  <li class="breadcrumb-item"><a href="/bonus/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Бонус #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Бонус">
  <form action="{{ route('bonus.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.bonus-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection