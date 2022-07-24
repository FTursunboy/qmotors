@extends('dashboard.layouts.default')

@section('title', 'Дашборд')

@section('content')
<div class="profile mb-2">
  <div class="profile-header">
    <!-- BEGIN profile-header-cover -->
    <div class="profile-header-cover"></div>
    <!-- END profile-header-cover -->
    <!-- BEGIN profile-header-content -->
    <div class="profile-header-content">
      <!-- BEGIN profile-header-img -->
      <div class="profile-header-img">
        <img src="{{ asset($model->avatar) }}" alt="">
      </div>
      <!-- END profile-header-img -->
      <!-- BEGIN profile-header-info -->
      <div class="profile-header-info">
        <h4 class="mt-0 mb-1">{{ $model->full_name }}</h4>
        <p class="mb-2"><a href="tel:{{ $model->phone_number }}">{{ $model->phone_number }}</a></p>
        {{-- <a href="#" class="btn btn-xs btn-yellow">Edit Profile</a> --}}
      </div>
      <!-- END profile-header-info -->
    </div>
    <!-- END profile-header-content -->
  </div>
</div>
<x-dashboard.panel title="Информация о пользователе">
  <x-dashboard.user-show :model="$model" />
</x-dashboard.panel>
@endsection