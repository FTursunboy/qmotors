<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	@include('dashboard.includes.head')
</head>
@php
$bodyClass = (!empty($boxedLayout)) ? 'boxed-layout ' : '';
$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : '';
$bodyClass .= (!empty($bodyExtraClass)) ? $bodyExtraClass . ' ' : '';
@endphp

<body class="{{ $bodyClass }}">
	@include('dashboard.includes.component.page-loader')

	@yield('content')

	@include('dashboard.includes.page-js')
</body>

</html>