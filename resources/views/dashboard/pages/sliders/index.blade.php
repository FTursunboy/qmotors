@extends('dashboard.layouts.default')

@section('title', 'Sliders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Sliders" :add-url="route('dashboard.sliders.add')">
	<x-dashboard.slider-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection