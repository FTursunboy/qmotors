@extends('dashboard.layouts.default')

@section('title', 'Delivery Times')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Delivery Times" :add-url="route('dashboard.delivery-times.add')">
	<x-dashboard.delivery-time-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection