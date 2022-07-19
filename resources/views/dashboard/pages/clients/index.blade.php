@extends('dashboard.layouts.default')

@section('title', 'Customers')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Customers">
	<x-dashboard.client-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection