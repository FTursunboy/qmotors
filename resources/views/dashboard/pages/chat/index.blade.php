@extends('dashboard.layouts.default')

@section('title', 'Чат')

@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
    <li class="breadcrumb-item"><a href="/users">Пользователи</a></li>
    <li class="breadcrumb-item"><a href="/users/{{ $user->id }}">{{ $user->full_name }}</a></li>
    <li class="breadcrumb-item active">Чат</li>
</ol>
<h1 class="page-header">Чат</h1>
<x-dashboard.panel :title="$user->full_name">

    <x-dashboard.chat-vue-messages :chat="$user->chat" />
    <x-slot name="footer">
        <x-dashboard.chat-form :chat="$user->chat" />
    </x-slot>
</x-dashboard.panel>

@endsection