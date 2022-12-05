@extends('dashboard.layouts.default')

@section('title', 'СМС логи')

@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Дашборд</a></li>
        <li class="breadcrumb-item active">СМС логи</li>
    </ol>
    <!-- begin page-header -->
    <h1 class="page-header">СМС логи</h1>
    <!-- end page-header -->

    <div class="row">
        <div class="col-md-12">
            <x-dashboard.panel title="СМС логи">
                <x-dashboard.sms-log-table/>
            </x-dashboard.panel>
        </div>
        {{-- <div class="col-md-3">
          <x-dashboard.panel title="Фильтры">
            <x-dashboard.push-token-filter />
          </x-dashboard.panel>
        </div> --}}
    </div>

@endsection
