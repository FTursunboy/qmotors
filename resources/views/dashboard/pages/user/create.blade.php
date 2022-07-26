@extends('dashboard.layouts.default')

@section('title', 'Пользовател')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Пользователи</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Пользовател</h1>
<!-- end page-header -->

<x-dashboard.panel title="Пользовател">
  <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-dashboard.user-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection