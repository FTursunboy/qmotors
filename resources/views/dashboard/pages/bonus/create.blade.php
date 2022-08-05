@extends('dashboard.layouts.default')

@section('title', 'Бонус')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Бонусы</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Бонус</h1>
<!-- end page-header -->

<x-dashboard.panel title="Бонус">
  <form action="{{ route('bonus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-dashboard.bonus-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection