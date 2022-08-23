@extends('dashboard.layouts.default')

@section('title', 'Статья')

@section('content')
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
  <li class="breadcrumb-item"><a href="/users">Статьи</a></li>
  <li class="breadcrumb-item active">Создать</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Статья</h1>
<!-- end page-header -->

<x-dashboard.panel title="Статья">
  <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-dashboard.article-form :model="$model" />
  </form>
</x-dashboard.panel>

@endsection