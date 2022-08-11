<?php

return [

	/*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

	'menu' => [
		[
			'icon' => 'fa fa-th-large',
			'title' => 'Дашборд',
			'url' => '/dashboard',
		],
		[
			'icon' => 'fa fa-users',
			'title' => 'Пользователи',
			'url' => '/users',
		],
		// [
		// 	'icon' => 'fa fa-th-large',
		// 	'title' => 'Дашборд Версия 2',
		// 	'url' => '/version-1',
		// ],
		[
			'icon' => 'fa fa-car',
			'title' => 'Автомобили Пользователя',
			'url' => '/user-car',
		],
		[
			'icon' => 'fa fa-medkit',
			'title' => 'Заказы',
			'url' => '/order',
		],
		[
			'icon' => 'fa fa-building',
			'title' => 'Техцентры',
			'url' => '/tech-center',
		],
		[
			'icon' => 'fa fa-calendar-alt',
			'title' => 'Напоминания',
			'url' => '/reminder',
		],
		[
			'icon' => 'fa fa-gift',
			'title' => 'Бонусы',
			'url' => '/bonus',
		],
		// [
		// 	'icon' => 'fa fa-desktop',
		// 	'title' => 'Sliders',
		// 	'url' => '/dashboard/sliders',
		// 	'caret' => true,
		// 	'sub_menu' => [
		// 		[
		// 			'url' => '/dashboard/sliders/add',
		// 			'title' => 'Add'
		// 		]
		// 	]
		// ],
		// [
		// 	'icon' => 'fa fa-users',
		// 	'title' => 'Customers',
		// 	'url' => '/dashboard/clients',
		// ],
		// [
		// 	'icon' => 'fa fa-coffee',
		// 	'title' => 'Products',
		// 	'url' => '/dashboard/products',
		// 	'caret' => true,
		// 	'sub_menu' => [
		// 		[
		// 			'url' => '/dashboard/products/add',
		// 			'title' => 'Add'
		// 		]
		// 	]
		// ],
		// [
		// 	'icon' => 'fa fa-shopping-basket',
		// 	'title' => 'One Time Orders',
		// 	'url' => '/dashboard/orders/one-time',
		// ],
		// [
		// 	'icon' => 'fa fa-shopping-cart',
		// 	'title' => 'Subscription Orders',
		// 	'url' => '/dashboard/orders/subscription',
		// ],
		// [
		// 	'icon' => 'fa fa-cog',
		// 	'title' => 'Settings',
		// 	'url' => '/dashboard/settings',
		// ],
		// [
		// 	'icon' => 'fa fa-clock',
		// 	'title' => 'Delivery Times',
		// 	'url' => '/dashboard/delivery-times',
		// 	'caret' => true,
		// 	'sub_menu' => [
		// 		[
		// 			'url' => '/dashboard/delivery-times/add',
		// 			'title' => 'Add'
		// 		]
		// 	]
		// ],
		// [
		// 	'icon' => 'fa fa-align-left',
		// 	'title' => 'Menu Level',
		// 	'url' => 'javascript:;',
		// 	'caret' => true,
		// 	'sub_menu' => [[
		// 		'url' => 'javascript:;',
		// 		'title' => 'Menu 1.1',
		// 		'sub_menu' => [[
		// 			'url' => 'javascript:;',
		// 			'title' => 'Menu 2.1',
		// 			'sub_menu' => [[
		// 				'url' => 'javascript:;',
		// 				'title' => 'Menu 3.1',
		// 			], [
		// 				'url' => 'javascript:;',
		// 				'title' => 'Menu 3.2'
		// 			]]
		// 		], [
		// 			'url' => 'javascript:;',
		// 			'title' => 'Menu 2.2'
		// 		], [
		// 			'url' => 'javascript:;',
		// 			'title' => 'Menu 2.3'
		// 		]]
		// 	], [
		// 		'url' => 'javascript:;',
		// 		'title' => 'Menu 1.2'
		// 	], [
		// 		'url' => 'javascript:;',
		// 		'title' => 'Menu 1.3'
		// 	]]
		// ]
	]
];
