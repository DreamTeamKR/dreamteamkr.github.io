<?php defined('droot') OR die('No direct script access.');
require_once ('Classes/PHPExcel/IOFactory.php');
//require_once (dmodel."phpexce".ext);
/*require_once (dmodel."phpjson".ext);
require_once (dmodel."phpxml".ext);*/
class  parent_loadfile{
	public $db_id = null;
	public $table = array();
	public function __construct(){
		return new loadfile();
	}
	public static function loadphpexce($file,$val){
		$table = array('category'=>array('name'=>3,'image'=>4),'characteristic'=>array('name'=>9),'contragent'=>array('name'=>11,'phone'=>12),'product'=>array('category'=>0,'name'=>5),
						'category_characteristic'=>array('category'=>0,'characteristic'=>0),'value'=>array('characteristic'=>0,'name'=>10),'storage'=>array('price'=>7,'product'=>0,'count'=>8,'contragent'=>0,'image'=>6),
						'storage_characteristic'=>array('storage'=>0,'characteristic'=>0,'value'=>0));
		$xls = PHPExcel_IOFactory::load($file["tmp_name"]);
		$xls->setActiveSheetIndex($val[0]-1);
		$sheet = $xls->getActiveSheet();$value=array();
		$where1 = $vars1 = $where = $vars = $data= array();$k=0;
		for ($i = $val[1]; $i <= $val[2]; $i++){
			//if(strlen($sheet->getCellByColumnAndRow($val[3]-1, $i)->getValue())>0){$value=[];}
			foreach($table as $tk=>$cv){
				foreach($cv as $col=>$vc){
					if($col=='name'){
						$tmp=($vc!=null)?$sheet->getCellByColumnAndRow($val[$vc]-1, $i)->getValue():0;
						if(strlen($tmp)>0){
							$value[$tk][$col]=$tmp;
							$where[]=$tk.".".$col." = '@value@'";
							$vars['value'] = $value[$tk][$col];
						}
						if(count($where)>0){$q = sql::q("SELECT * FROM ".$tk." WHERE ".implode(' AND ',$where)."LIMIT 0 , 30",$vars);
							while ($line = $q->row())
								$data[]=$line;
						}
						if(count($data)>0){
							$value[$tk]['id']=$data[0]['id'];
							$value[$tk]['status']='update';
						}else{
							if(strlen($tmp)>0)unset($value[$tk]['id'],$value[$tk]['status']);//echo "unset<br>";
						}
					}else{
						if(('price'==$col||'count'==$col||'image'==$col||'phone'==$col)&&($vc!=null)){
							$tmp= $sheet->getCellByColumnAndRow($val[$vc]-1, $i)->getValue();
							if(strlen($tmp)>0)$value[$tk][$col]=$tmp;
						}else{
							$value[$tk][$col]=$value[$col]['id'];$k++;
							$where1[]=$tk.".".$col." = '@value@'";
							$vars1['value'] = $value[$tk][$col];
							if($k>1){
								if(count($where1)>0){$q = sql::q("SELECT * FROM ".$tk." WHERE ".implode(' AND ',$where1)."LIMIT 0 , 30",$vars1);
									while ($line = $q->row())
										$data[]=$line;
								}
								if(count($data)>0){
									$value[$tk]['id']=$data[0]['id'];
									$value[$tk]['status']='update';
								}else{
									if($k==3){unset($value[$tk]['status'],$value[$tk]['id']);}
								}
							}
						}
					}
				}
				$data=$where=$vars=$where1=$vars1=[];//
				if(empty($value[$tk]['status'])){
					$q = sql::add($tk,$value[$tk],array());
					//print_r($q);
					$value[$tk]['id']=$q['start'];
					$value[$tk]['status']='update';
				}else{
					//print_r($value[$tk]);
					$tmp=$value[$tk];
					unset($tmp['status'],$tmp['id']);
					$q = sql::up($tk,$tmp,$tk.".id=".$value[$tk]['id']);
					//print_r($q);
				}$k=0;
			}
		}
	}
}
class loadfile extends parent_loadfile {}