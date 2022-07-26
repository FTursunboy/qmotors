@extends('dashboard.layouts.default')

@section('title', 'Изменит Техцентр')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/tech-center">Техцентры</a></li>
  <li class="breadcrumb-item"><a href="/tech-center/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Техцентр #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Техцентр">
  <form action="{{ route('tech-center.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.tech-center-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection