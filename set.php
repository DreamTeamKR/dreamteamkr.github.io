<?php defined('droot') OR die('No direct script access.');
$set=array(
	'db'=>array(
		'host' => '34359.s.time4vps.cloud',
		'user' => 'root',
		'pass' => '',
		'name' => 'mebel',
		'prefix' => '',
		'errors' => true
	),
	'route' => array(
		'default'=>array('file'=>'main','action'=>'index'),
		'dirs'=>array(
				'view'=>array(
					'js'=>'d:1;f:1',
					'css'=>'d:1;f:1',
					'images'=>'d:0;f:1'
				),
				'media'=>''
			)//def d:0;f:1   0(d:denied;f:denied),1(d:allow;f:get),2(f:including)
	),
	//path
	'site'=>array(
		'title'=>'title',
		'keywords'=>'keywords',
		'description'=>'description',
		'url'=>array(
			'base'=>'dream/',
			'client_path' => 'view',
			'media' => 'media'
		),
		'css_theme'=>'sunny'
	),
	'interface' => array(
		'category'=>'Каталог категорий',
		'search'=>'Результаты поиска',
	)
);