@extends('dashboard.layouts.default')

@section('title', 'Subscription Orders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Subscription Orders">
	<x-dashboard.subscription-orders-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection