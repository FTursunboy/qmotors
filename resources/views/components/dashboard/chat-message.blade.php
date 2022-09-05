@php
$message = $attributes['message'];
$is_admin = $message->admin_user != null;
$user = $message->user??$message->admin_user;
$is_own = $is_admin && $user->id == auth()->guard('admin')->id();
@endphp
<div class="@if($is_own) right @else left @endif">
    <span class="date-time">{{ $message->created_at }}</span>
    @if ($is_admin)
    <a href="javascript:;" class="name"><span class="label label-primary">Админ</span>
        @if ($is_own)
        Я
        @endif
    </a>
    @endif
    @if (!$is_admin)
    <a href="javascript:;" class="name">{{ $user->full_name }}</a>
    @endif


    {{-- @if (!$is_admin) --}}
    <a href="javascript:;" class="image"><img alt="" src="{{ asset($user->avatar) }}" /></a>
    {{-- @endif --}}
    <div class="message @if($is_own) bg-gradient-aqua text-white @endif">
        @if ($message->photo)
        <a href="{{ asset($message->photo) }}" target="blank">
            <img src="{{ asset($message->photo) }}" alt="" width="150"> <br><br>
        </a>
        @endif
        @if ($message->video)
        <a href="{{ asset($message->video) }}" target="blank">
            <video width="150" controls>
                <source src="{{ asset($message->video) }}">
            </video> <br> <br>
        </a>
        @endif
        {{$message->message}}
    </div>
</div>