@extends('dashboard.layouts.default')

@section('title', 'Автомобили Пользавателя')

@section('content')

<!-- begin page-header -->
<h1 class="page-header">Автомобили Пользавателя</h1>
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