<?php defined('droot') OR die('No direct script access.');
class common extends template {
	public $template = 'main';
	public $auth = false;
	public function before()
	{
		parent::before();
		$this->is_ajax = ((isset($_SERVER) and (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) or isset($_REQUEST['is_ajax']));

		$out=out::view(($this->is_ajax?"ajax":"main"));
		//$out=out::view("main");
		$client_path=$this->config['site']['url']['base'].$this->config['site']['url']['client_path'].'/';		
		$css_theme=$this->config['site']['css_theme'];
		$glob=array(
			'set' => $this->config,
			'title' => $this->config['site']['title'],
			'keywords' => $this->config['site']['keywords'],
			'description' => $this->config['site']['description'],
			'jscripts'=>array('globals','jq','main'),//,'header','content','sidebar','footer','icons','player');
			'styles'=>array('bootstrap.min','font-awesome.min','style'),
			'url'=>array(
				'base'=>$this->config['site']['url']['base'],
				'client_path'=>$client_path,
				'css'=>$client_path.'css/',
				'js'=>$client_path.'js/',
				'img'=>$client_path.'images/'
			),
			'sidebar'=>(out::view("pages/sidebar")),
			'header'=>(out::view("pages/header")),
			'content'=>(out::view("pages/home"))
		);
		$out->set_global($glob);
		$this->template=$out;
	}
	public function after()
	{		
		//if(!$this->auth)	
			//$this->template->set_global(array('content'=>out::view("pages/home"),'sidebar'=>''));
		parent::after();
		
	}
}