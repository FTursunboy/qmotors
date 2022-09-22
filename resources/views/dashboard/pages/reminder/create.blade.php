@extends('dashboard.layouts.default')

@section('title', 'Напоминания')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Уведомление</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Напоминания</h1>
<!-- end page-header -->

<x-dashboard.panel title="Напоминания">
  <form action="{{ route('reminder.store') }}" method="POST">
    @csrf
    <x-dashboard.reminder-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection