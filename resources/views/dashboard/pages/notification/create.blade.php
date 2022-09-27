@extends('dashboard.layouts.default')

@section('title', 'Уведомление')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Уведомление</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Уведомление</h1>
<!-- end page-header -->

<x-dashboard.panel title="Уведомление">
  <form action="{{ route('notification.store') }}" method="POST">
    @csrf
    <x-dashboard.notification-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection