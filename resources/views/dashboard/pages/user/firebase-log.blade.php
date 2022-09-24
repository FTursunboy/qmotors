@extends('dashboard.layouts.default')

@section('title', 'Firebasу логи')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Firebasу логи</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Firebasу логи</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-12">
    <x-dashboard.panel title="Firebasу логи">
      <x-dashboard.firebase-log-table />
    </x-dashboard.panel>
  </div>
  {{-- <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.push-token-filter />
    </x-dashboard.panel>
  </div> --}}
</div>

@endsection