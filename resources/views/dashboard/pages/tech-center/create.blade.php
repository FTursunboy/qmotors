@extends('dashboard.layouts.default')

@section('title', 'Техцентр')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/user-car">Техцентри</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Техцентр</h1>
<!-- end page-header -->

<x-dashboard.panel title="Техцентр">
  <form action="{{ route('tech-center.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-dashboard.tech-center-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection