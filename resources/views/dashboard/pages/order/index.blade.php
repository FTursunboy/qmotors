@extends('dashboard.layouts.default')

@section('title', 'Заказы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Заказы</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Заказы</h1>
<!-- end page-header -->
{{--
<div class="row">
  <div class="col-md-9"> --}}

    <x-dashboard.order-filter />

    <x-dashboard.panel title="Заказы">
      <x-dashboard.order-table />
    </x-dashboard.panel>
    {{--
  </div>

</div> --}}

@endsection