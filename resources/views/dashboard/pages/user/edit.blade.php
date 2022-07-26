@extends('dashboard.layouts.default')

@section('title', 'Изменит Пользовател')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Пользователи</a></li>
  <li class="breadcrumb-item"><a href="/users/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Пользовател #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Пользовател">
  <form action="{{ route('user.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.user-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection