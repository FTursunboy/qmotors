@extends('dashboard.layouts.default')

@section('title', 'Напоминания')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/reminder">Напоминания</a></li>
  <li class="breadcrumb-item"><a href="/reminder/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Напоминание #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменить Напоминание">
  <form action="{{ route('reminder.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <x-dashboard.reminder-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection