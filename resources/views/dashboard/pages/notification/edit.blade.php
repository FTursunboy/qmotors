@extends('dashboard.layouts.default')

@section('title', 'Изменит Увидомление')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/notification">Уведомления</a></li>
  <li class="breadcrumb-item"><a href="/notification/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Увидомление #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Увидомление">
  <form action="{{ route('notification.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.notification-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection