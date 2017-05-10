<?php defined('droot') OR die('No direct script access.');
class parent_db{
	public $db_id = null;
	public $conf = null;
	public $query_id = null;
	public function __construct($conf = null)
	{
		if ($conf !== NULL)
		{
			$this->connect($conf);
		}
	}
	function connect($conf = null)
	{
		if($conf == null) die('Configuration error');
		
		if(!$this->db_id = mysqli_connect($conf['host'], $conf['user'], $conf['pass'])) {
			if ($conf['errors']) die('Connect to the database errors: '.mysqli_error());
			else die('Connect to the database errors');
		} 

		if(!mysqli_select_db($this->db_id, $conf['name'])) {
			if ($conf['errors']) die('Connect to the database errors: '.mysqli_error());
			else die('Connect to the database errors');
		}
		mysqli_query($this->db_id,"SET NAMES 'utf8'"); //cp1251
		mysqli_query($this->db_id,"SET CHARACTER SET 'utf8'"); 
		$this->conf = $conf;
		return true;
	}
}
class db extends parent_db {}