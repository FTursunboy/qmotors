@extends('dashboard.layouts.default')

@section('title', 'Delivery Times')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Delivery Times">
	<x-dashboard.delivery-time-form />
</x-dashboard.panel>
<!-- end panel -->
@endsection