<?php defined('droot') OR die('No direct script access.');

	require_once(droot."set".ext);
	//model
	require_once (dmodel."db".ext);
	require_once (dmodel."sql".ext);
	require_once (dmodel."out".ext);
	require_once (dmodel."loadfile".ext);
	//controller
	require_once (dsystem."template".ext);
	
	global $db, $load;
	$db = new db();
	$db->connect($set['db']);
	$load = new loadfile();
	require_once(dsystem."uri".ext);

	if(!empty($request_uri[0])){
		
	}else
		$request_uri[0]=$set['route']['default']['file'];
	if(empty($request_uri[1]))
		$request_uri[1]=$set['route']['default']['action'];
	if(is_file(dcontroller.$request_uri[0].ext)){
		require_once (dcontroller.$request_uri[0].ext);
		if(class_exists($request_uri[0], FALSE)){
			$o=new $request_uri[0]($set);
			if(method_exists($o,$request_uri[1])){
				$o->{$request_uri[1]}();
			}else die("action <b>{$request_uri[1]}</b> not found");
			unset($o);
		}else die("class <b>{$request_uri[0]}</b> not found");
	}else die("file <b>{$request_uri[0]}</b> not found");