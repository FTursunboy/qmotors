@extends('dashboard.layouts.default')

@section('title', 'Firebase логи')

@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
        <li class="breadcrumb-item active">Firebase логи</li>
    </ol>
    <!-- begin page-header -->
    <h1 class="page-header">Firebase логи</h1>
    <!-- end page-header -->

    <div class="row">
        <div class="col-md-12">
            <x-dashboard.panel title="Firebase логи">
                <x-dashboard.firebase-log-table/>
            </x-dashboard.panel>
        </div>
        {{-- <div class="col-md-3">
          <x-dashboard.panel title="Фильтры">
            <x-dashboard.push-token-filter />
          </x-dashboard.panel>
        </div> --}}
    </div>

@endsection
