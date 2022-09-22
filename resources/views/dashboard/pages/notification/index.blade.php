@extends('dashboard.layouts.default')

@section('title', 'Уведомление')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Уведомление</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Уведомление</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Уведомление">
      <x-dashboard.notification-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.notification-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection