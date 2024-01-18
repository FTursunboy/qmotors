@php
$headerClass = (!empty($headerInverse)) ? 'navbar-inverse ' : 'navbar-default ';
$headerMenu = (!empty($headerMenu)) ? $headerMenu : '';
$headerMegaMenu = (!empty($headerMegaMenu)) ? $headerMegaMenu : '';
$headerTopMenu = (!empty($headerTopMenu)) ? $headerTopMenu : '';
@endphp
<!-- begin #header -->
<div id="header" class="header {{ $headerClass }}">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		@if ($sidebarTwo)
		<button type="button" class="navbar-toggle pull-left" data-click="right-sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
		<a href="/" class="navbar-brand"><span class="navbar-logo"></span> <b>Ваш автосервис</b></a>
		@if ($headerMegaMenu)
		<button type="button" class="navbar-toggle pt-0 pb-0 mr-0" data-toggle="collapse" data-target="#top-navbar">
			<span class="fa-stack fa-lg text-inverse">
				<i class="far fa-square fa-stack-2x"></i>
				<i class="fa fa-cog fa-stack-1x"></i>
			</span>
		</button>
		@endif
		@if (!$sidebarHide && $topMenu)
		<button type="button" class="navbar-toggle pt-0 pb-0 mr-0 collapsed" data-click="top-menu-toggled">
			<span class="fa-stack fa-lg text-inverse">
				<i class="far fa-square fa-stack-2x"></i>
				<i class="fa fa-cog fa-stack-1x"></i>
			</span>
		</button>
		@endif
		@if (!$sidebarHide && !$headerTopMenu)
		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
		@if ($headerTopMenu)
		<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
	</div>
	<!-- end navbar-header -->

	@includeWhen($headerMegaMenu, 'includes.header-mega-menu')

	<!-- begin header-nav -->
	<ul class="navbar-nav navbar-right">
		<li class="dropdown navbar-user">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<div class="image image-icon bg-black text-grey-darker">
					<i class="fa fa-user"></i>
				</div>
				<span class="d-none d-md-inline"></span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
																this.closest('form').submit();">
						{{ __('Выход') }}
					</x-dropdown-link>
				</form>
			</div>
		</li>
		@if($sidebarTwo)
		<li class="divider d-none d-md-block"></li>
		<li class="d-none d-md-block">
			<a href="javascript:;" data-click="right-sidebar-toggled" class="f-s-14">
				<i class="fa fa-th"></i>
			</a>
		</li>
		@endif
	</ul>
	<!-- end header navigation right -->
</div>
<!-- end #header -->
