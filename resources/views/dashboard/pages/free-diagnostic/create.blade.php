@extends('dashboard.layouts.default')

@section('title', 'Бесплатная диагностика')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Бесплатные диагностики</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Бесплатная диагностика</h1>
<!-- end page-header -->

<x-dashboard.panel title="Бесплатная диагностика">
  <form action="{{ route('free-diagnostic.store') }}" method="POST">
    @csrf
    <x-dashboard.free-diagnostic-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection