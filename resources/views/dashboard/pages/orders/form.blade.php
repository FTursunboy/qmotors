@extends('dashboard.layouts.default')

@section('title', 'Orders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Orders">
	<x-dashboard.order-form :order="$order" />
</x-dashboard.panel>
<!-- end panel -->
@endsection