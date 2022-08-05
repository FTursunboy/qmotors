@extends('dashboard.layouts.default')

@section('title', 'Бонусы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Бонусы</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Бонусы</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Бонусы">
      <x-dashboard.bonus-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.bonus-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection