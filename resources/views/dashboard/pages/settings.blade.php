@extends('dashboard.layouts.default')

@section('title', 'Settings')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Settings">
	<x-dashboard.settings-form />
</x-dashboard.panel>
<!-- end panel -->
@endsection