@extends('dashboard.layouts.default')

@section('title', 'Products')

@section('content')


<!-- begin panel -->
<x-dashboard.panel title="Products" :add-url="route('dashboard.products.add')">
	<x-dashboard.product-table />
</x-dashboard.panel>
<!-- end panel -->
@endsection