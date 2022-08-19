@extends('dashboard.layouts.default')

@section('title', 'Отзывы')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/review">Отзывы</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Отзыв #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Отзыв подробнее">
  <x-dashboard.review-show :model="$model" />
</x-dashboard.panel>


@endsection