@extends('dashboard.layouts.default')

@section('title', 'Изменит Автосервис')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/tech-center">Автосервисы</a></li>
  <li class="breadcrumb-item"><a href="/tech-center/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Автосервис #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Автосервис">
  <form action="{{ route('tech-center.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.tech-center-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection