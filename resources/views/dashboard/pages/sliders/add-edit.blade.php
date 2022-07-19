@extends('dashboard.layouts.default')

@section('title', 'Sliders')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Sliders">
	<x-dashboard.slider-form :slider="$slider" />
</x-dashboard.panel>
<!-- end panel -->
@endsection