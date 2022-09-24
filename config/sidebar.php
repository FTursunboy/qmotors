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
			'icon' => 'fa fa-charging-station',
			'title' => 'Бесплатные диагностики',
			'url' => '/free-diagnostic',
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
		[
			'icon' => 'fa fa-bell',
			'title' => 'Уведомление',
			'url' => '/notification',
		],
		[
			'icon' => 'fa fa-comments',
			'title' => 'Отзывы',
			'url' => '/review',
		],
		[
			'icon' => 'fa fa-shopping-bag',
			'title' => 'Акции',
			'url' => '/stock',
		],
		[
			'icon' => 'fa fa-newspaper',
			'title' => 'Статьи',
			'url' => '/article',
		],
		[
			'icon' => 'fa fa-info',
			'title' => 'Помощь',
			'url' => '/help',
		],
		[
			'icon' => 'fa fa-key',
			'title' => 'Пуш токены',
			'url' => '/push-token',
		],
		[
			'icon' => 'fa fa-fire',
			'title' => 'Firebase логи',
			'url' => '/firebase-log',
		],
	]
];
