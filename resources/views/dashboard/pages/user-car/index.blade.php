@extends('dashboard.layouts.default')

@section('title', 'Автомобили пользователя')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Автомобили пользователя</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автомобили пользователя</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Автомобили">
      <x-dashboard.user-car-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.user-car-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection