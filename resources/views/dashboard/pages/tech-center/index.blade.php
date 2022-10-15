@extends('dashboard.layouts.default')

@section('title', 'Автосервисы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Автосервисы</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Автосервисы</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Автосервисы">
      <x-dashboard.tech-center-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.tech-center-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection