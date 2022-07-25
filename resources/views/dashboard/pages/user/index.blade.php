@extends('dashboard.layouts.default')

@section('title', 'Пользователи')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Пользователи</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Пользователи</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Пользователи">
      <x-dashboard.user-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.user-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection