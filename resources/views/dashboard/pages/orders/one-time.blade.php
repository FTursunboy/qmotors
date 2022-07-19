@extends('dashboard.layouts.default')

@section('title', 'One Time Orders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="One Time Orders">
	<x-dashboard.one-time-orders-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection