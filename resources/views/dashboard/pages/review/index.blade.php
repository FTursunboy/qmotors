@extends('dashboard.layouts.default')

@section('title', 'Отзывы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Отзывы</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Отзывы</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Отзывы">
      <x-dashboard.review-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.review-filter />
    </x-dashboard.panel>
  </div>

</div>

@endsection