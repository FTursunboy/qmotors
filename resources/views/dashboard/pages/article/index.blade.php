@extends('dashboard.layouts.default')

@section('title', 'Статьи')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item active">Статьи</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Статьи</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-9">
    <x-dashboard.panel title="Статьи">
      <x-dashboard.article-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-3">
    <x-dashboard.panel title="Фильтры">
      <x-dashboard.article-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection