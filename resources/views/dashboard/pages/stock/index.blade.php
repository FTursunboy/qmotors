@extends('dashboard.layouts.default')

@section('title', 'Акции')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Акции</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Акции</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Акции">
      <x-dashboard.stock-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.stock-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection