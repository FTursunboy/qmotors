@extends('dashboard.layouts.default')

@section('title', 'Статьи')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/article">Статьи</a></li>
  <li class="breadcrumb-item active">{{ $model->id }}</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Статья #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Статья подробнее">
  <x-dashboard.article-show :model="$model" />
</x-dashboard.panel>


@endsection