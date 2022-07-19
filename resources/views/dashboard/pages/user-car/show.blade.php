@extends('dashboard.layouts.default')

@section('title', 'User Cars')

@section('content')

<!-- begin page-header -->
<h1 class="page-header">User Car #{{ $model->id }}</h1>
<!-- end page-header -->
<x-dashboard.panel title="User Car">
  <x-dashboard.user-car-show :model="$model" />
</x-dashboard.panel>

@endsection