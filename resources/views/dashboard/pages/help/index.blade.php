@extends('dashboard.layouts.default')

@section('title', 'Напишите вопрос-ответ')

@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
    <li class="breadcrumb-item"><a href="/help">Помощь</a></li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Помощь</h1>
<!-- end page-header -->

<x-dashboard.panel title="Напишите вопрос-ответ">
    <form action="{{ route('help.update') }}" method="POST">
        @csrf
        @method('PUT')
        <x-dashboard.help-form :model="$model" />
    </form>
</x-dashboard.panel>

@endsection
