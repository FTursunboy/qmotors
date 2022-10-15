@extends('dashboard.layouts.default')

@section('title', 'Автосервис')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/tech-center">Автосервиси</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Автосервис</h1>
<!-- end page-header -->

<x-dashboard.panel title="Автосервис">
  <form action="{{ route('tech-center.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-dashboard.tech-center-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection