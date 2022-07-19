@extends('dashboard.layouts.default')

@section('title', 'User Cars')

@section('content')

<!-- begin page-header -->
<h1 class="page-header">User Cars</h1>
<!-- end page-header -->

<div class="row">
  <div class="col-md-10">
    <x-dashboard.panel title="Cars">
      <x-dashboard.user-car-table />
    </x-dashboard.panel>
  </div>
  <div class="col-md-2">
    <x-dashboard.panel title="Filter">
      <x-dashboard.user-car-filter />
    </x-dashboard.panel>
  </div>
</div>

@endsection