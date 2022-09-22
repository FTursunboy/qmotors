@extends('dashboard.layouts.default')

@section('title', 'Пуш токены')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Пуш токены</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Пуш токены</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Пуш токены">
      <x-dashboard.push-token-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.push-token-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection