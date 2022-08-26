@extends('dashboard.layouts.default')

@section('title', 'Безплатные диагностики')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Безплатные диагностики</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Безплатные диагностики</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">

    {{--
    <x-dashboard.free-diagnostic-filter /> --}}
    <x-dashboard.panel title="Безплатные диагностики">
      <x-dashboard.free-diagnostic-table />
    </x-dashboard.panel>

  </div>
  <div class="col-md-3">


    <x-dashboard.panel title="Фильтры">
      <x-dashboard.free-diagnostic-filter />
    </x-dashboard.panel>

  </div>

</div>

@endsection