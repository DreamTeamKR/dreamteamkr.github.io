<?php defined('droot') OR die('No direct script access.');
require_once (dcontroller."common".ext);
require_once (dmodel."loadfile".ext);
class main extends common {
	public function index(){
		$data=array();
		$q = sql::q("SELECT category.id AS cid,category.name AS cname,category.image AS img FROM category");
		while ($line = $q->row())
			$data[]=$line;
		$this->template->set_global('content',out::view("pages/home",array('data'=>$data)));
		$q = sql::q("SELECT value . * , characteristic.name AS characteristic_name FROM characteristic JOIN value ON characteristic.id=value.characteristic");
		while ($v = $q->row()){
			if(isset($filter[$v['characteristic']])){
				$filter[$v['characteristic']][] = $v;
			}else{
				$filter[$v['characteristic']] = array( $v );
			}
		}
		$this->template->set_global('sidebar', out::view("pages/sidebar", array( 'filter' =>$filter)));
	}
	public function downinf(){
		$this->template->set_global(array('content'=>out::view("pages/trans/downinf"),'sidebar'=>''));
	}
	public function download(){
		global $load;
		$data=[];
		if(isset($_FILES["filename"])&&isset($_POST['val'])&&!empty($_POST['val'][0])){
			if(strstr($_FILES["filename"]['name'],'.xls')){
				$data=$load->value=$load->loadphpexce($_FILES["filename"],$_POST['val']);
			}
		}else $this->template->set_global(array('content'=>out::view("pages/error_file")->render(),'sidebar'=>''));
		$this->template->set_global(array('sidebar'=>'','content'=>out::view("pages/trans/download",array('data'=>$data))->render()));
	}
	public function send(){
		global $load;
		if (!empty($_POST['filter'])){
			$load->insorup($_POST['filter']['load']);
		}
		$this->template->set_global(array('sidebar'=>'','content'=>out::view("pages/trans/download")->render()));
	}
	public function product(){
		$data= array();
		$where = $vars = $data= array();
		$vew_vars = array('titles' => array( $this->config['interface']['category'] ) );
		if( !empty($_GET['prod']) ){
			$where[]="product.id = '@prod@'";
			$vars['prod'] = $_GET['prod'];
		}
		if( count($where)>0 ){
			$q = sql::q("SELECT value.name as vname,characteristic.name AS chname,pr.cid,pr.cname,pr.pname,pr.price,pr.count,pr.image,pr.caname,pr.phone
			FROM (SELECT category.id as cid,category.name as cname,product.name as pname,storage.id as stid, storage.price,storage.count,storage.image,contragent.name as caname, contragent.phone
					FROM category 
					JOIN product ON (product.category=category.id)
					JOIN storage ON (product.id=storage.product)
					JOIN contragent ON (contragent.id=storage.contragent)
					WHERE ".implode(' AND ',$where)."
					) AS pr
			JOIN storage_characteristic ON (pr.stid=storage_characteristic.storage)
			JOIN value ON ( value.id = storage_characteristic.value )
			JOIN characteristic ON ( characteristic.id = value.characteristic )
			LIMIT 0 , 30",$vars);
			//if($q->q_res != null)
			while ($line = $q->row())
				$data[]=$line;
		}
		if( !empty($_GET['prod']) and !empty($data[0]['cname']) ){
			$vew_vars['titles'][] = $data[0]['cname'];
			$vew_vars['titles'][] = $data[0]['pname'];
		}
		$vew_vars['data'] = $data;
		$this->template->set_global(array('content'=>out::view("pages/trans/product",$vew_vars)->render(),'sidebar'=>''));
	}
	public function search(){
		//print_r($_GET);
		//print_r($_POST);
		$filter_vars = $filter = $filter_where = $where = $vars = $data= array();
		$group="";
		$vew_vars = array('titles' => array( $this->config['interface']['category'] ) );
		if( !empty($_POST['filter']) ){
			//print_r($_POST['filter']);
			$sel_filter = $_POST['filter'];//json_decode( $_POST['filter'], true );
			foreach( $sel_filter as $key => $val ){
				switch ($key){
					case "characteristic":
						$vars['cids:l'] = array_keys($val);
						$where[] = "storage_characteristic.value in(@cids@)";
					break;
					case "search":
						$vars['name'] = $val['name']['val'];
						$where[] = "product.name LIKE '%@name@%'";
					break;
				}
			}
			$group="GROUP BY product.id ";
		}else{
			if( !empty($_POST['url']) ){
				$where[]="product.category = '@category@'";
				$vars['category'] = $_POST['url']['category'];
				$group="GROUP BY product.id ";
			}
		}
		if( !empty($_POST['name']) and strlen($_POST['name'])>1 ){
			$where[]="product.name LIKE '%@name@%'";
			$vars['name'] = $_POST['name'];
			$vew_vars['titles'][] = $this->config['interface']['search'] . " ( {$vars['name']} )";
		}
		if( !empty($_GET['category']) ){
			$where[]="product.category = '@category@'";
			$vars['category'] = $_GET['category'];
			$group="GROUP BY product.id ";
		}
		if( count($where)>0 ){
			$q = sql::q("SELECT product . * , category.name AS cname, category.id AS cid, storage.image AS img
				FROM storage_characteristic
					JOIN storage ON (storage.id=storage_characteristic.storage)
					JOIN product ON ( product.id = storage.product )
					JOIN category ON ( category.id = product.category )
				WHERE ". implode(' AND ',$where).$group.
				"LIMIT 0 , 30",$vars);
			//if($q->q_res != null)
			while ($line = $q->row())
				$data[]=$line;
		}
		if( !empty($_GET['category']) and !empty($data[0]['cname']) ){
			$vew_vars['titles'][] = $data[0]['cname'];
		}
		if(isset($vars['category'])){
			$filter_where[] = " category_characteristic.category = '@cid@'";
			$filter_vars['cid'] = $vars['category'];
		}
		$q1 = sql::q("SELECT value . * , characteristic.name AS characteristic_name
			FROM category_characteristic
			JOIN characteristic ON ( characteristic.id = category_characteristic.characteristic )
			JOIN value ON ( value.characteristic = characteristic.id ) 
				". ( count($filter_where)>0? ' WHERE '.implode(' AND ',$filter_where):'') ."
			LIMIT 0 , 30",$filter_vars);
		//if($q->q_res != null)
		while ($v = $q1->row()){
			if(isset($filter[$v['characteristic']])){
				$filter[$v['characteristic']][] = $v;
			}else{
				$filter[$v['characteristic']] = array( $v );
			}
		}
		//$vew_vars['filter'] = $filter;
		$vew_vars['data'] = $data;
		$this->template->set_global('sidebar', out::view("pages/sidebar", array( 'filter' =>$filter)));
		$this->template->set_global('content', out::view("pages/trans/products",$vew_vars)->render());
	}
	public function category(){
		$data= array();
		$q = sql::q("SELECT *
			FROM category 
			LIMIT 0 , 30");
		while ($line = $q->row())
			$data[]=$line;
		$this->template->set_global('content',out::view("pages/trans/products",array('title'=>$this->config['interface']['category'],'data'=>$data))->render());
	}
}