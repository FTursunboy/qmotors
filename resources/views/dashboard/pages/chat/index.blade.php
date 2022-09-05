@extends('dashboard.layouts.default')

@section('title', 'Чат')

@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
    <li class="breadcrumb-item"><a href="/users">Пользователи</a></li>
    <li class="breadcrumb-item"><a href="/users/{{ $user->id }}">{{ $user->full_name }}</a></li>
    <li class="breadcrumb-item active">Чат</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Чат</h1>
<!-- end page-header -->
{{-- @dd($user->full_name); --}}
<x-dashboard.panel :title="$user->full_name">
    <x-dashboard.chat-messages />
    <x-slot name="footer">
        <x-dashboard.chat-form :chat="$user->chat" />
    </x-slot>
</x-dashboard.panel>

{{-- <div class="panel panel-inverse" data-sortable-id="index-2">
    <div class="panel-heading">
        <h4 class="panel-title">Chat History</h4>
    </div>
    <div class="panel-body bg-light">
        <div class="chats" data-scrollbar="true" data-height="63vh">
            <div class="left">
                <span class="date-time">yesterday 11:23pm</span>
                <a href="javascript:;" class="name">Sowse Bawdy</a>
                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-12.jpg" /></a>
                <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu
                    feugiat.
                </div>
            </div>
            <div class="right">
                <span class="date-time">08:12am</span>
                <a href="javascript:;" class="name"><span class="label label-primary">ADMIN</span> Me</a>
                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-13.jpg" /></a>
                <div class="message bg-gradient-aqua text-white">
                    Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
                </div>
            </div>
            <div class="left">
                <span class="date-time">09:20am</span>
                <a href="javascript:;" class="name">Neck Jolly</a>
                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-10.jpg" /></a>
                <div class="message">
                    Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                </div>
            </div>
            <div class="left">
                <span class="date-time">11:15am</span>
                <a href="javascript:;" class="name">Shag Strap</a>
                <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-14.jpg" /></a>
                <div class="message">
                    Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <form name="send_message_form" data-id="message-form" enctype="multipart/form-data">
            <div style="display: none">
                <input type="file" name="image" id="image-id">
                <input type="file" name="video" id="video-id">
                <input type="file" name="file" id="file-id">
            </div>
            <div class="input-group">
                <div class="btn-group">
                    <button class="btn btn-primary" type="button" onclick="onClickButton('image-id')"><i
                            class="fa fa-image"></i></button>
                    <button class="btn btn-primary" type="button" onclick="onClickButton('video-id')"><i
                            class="fa fa-video"></i></button>
                    <button class="btn btn-primary" type="button" onclick="onClickButton('file-id')"><i
                            class="fa fa-paperclip"></i></button>
                </div>
                <input type="text" class="form-control" name="message" placeholder="Enter your message here.">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fab fa-telegram-plane"></i></button>
                    <button class="btn btn-primary" type="submit"><i class="fab fa-telegram-plane"></i></button>
                </span>
            </div>
        </form>
    </div>
</div> --}}

@endsection