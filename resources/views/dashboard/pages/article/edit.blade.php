@extends('dashboard.layouts.default')

@section('title', 'Изменит Статья')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/article">Статьи</a></li>
  <li class="breadcrumb-item"><a href="/article/{{ $model->id }}">{{ $model->id }}</a></li>
  <li class="breadcrumb-item active">Изменить</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header"> Статья #{{ $model->id }}</h1>
<!-- end page-header -->

<x-dashboard.panel title="Изменит Статья">
  <form action="{{ route('article.update', $model->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-dashboard.article-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection