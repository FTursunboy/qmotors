@extends('dashboard.layouts.default')

@section('title', 'Orders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Subscription Pays">

	<x-dashboard.subscription-pays-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection