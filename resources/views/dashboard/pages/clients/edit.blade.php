@extends('dashboard.layouts.default')

@section('title', 'Sliders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Clients">
	<x-dashboard.client-form />
</x-dashboard.panel>
<!-- end panel -->
@endsection