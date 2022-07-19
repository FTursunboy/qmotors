@extends('dashboard.layouts.default')

@section('title', 'Products')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Products">
	<x-dashboard.product-form :product="$product" />
</x-dashboard.panel>
<!-- end panel -->
@endsection