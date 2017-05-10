<?php defined('droot') OR die('No direct script access.');
require_once ('Classes/PHPExcel/IOFactory.php');
//require_once (dmodel."phpexce".ext);
/*require_once (dmodel."phpjson".ext);
require_once (dmodel."phpxml".ext);*/
class  parent_loadfile{
	public $value = array();
	public $table = array();
	public function __construct($tabl=null){
		$this->table = ($tabl==null)? array('category'=>array('name'=>3,'image'=>4),'characteristic'=>array('name'=>9),'contragent'=>array('name'=>11,'phone'=>12),'product'=>array('category'=>0,'name'=>5),
						'category_characteristic'=>array('category'=>0,'characteristic'=>0),'value'=>array('characteristic'=>0,'name'=>10),'storage'=>array('price'=>7,'product'=>0,'count'=>8,'contragent'=>0,'image'=>6),
						'storage_characteristic'=>array('storage'=>0,'characteristic'=>0,'value'=>0)) : $tabl ;
	}
	public function loadphpexce($file,$val){
		$xls = PHPExcel_IOFactory::load($file["tmp_name"]);
		$xls->setActiveSheetIndex($val[0]-1);
		$sheet = $xls->getActiveSheet();$value=array();
		$where1 = $vars1 = $where = $vars = $data= array();$k=0;
		for ($i = $val[1]; $i <= $val[2]; $i++){
			//if(strlen($sheet->getCellByColumnAndRow($val[3]-1, $i)->getValue())>0){$value=[];}
			foreach($this->table as $tk=>$cv){
				foreach($cv as $col=>$vc){
					if($col=='name'){
						$tmp=($vc!=0)?$sheet->getCellByColumnAndRow($val[$vc]-1, $i)->getValue():'';
						if(strlen($tmp)>0){
							$value[$i][$tk][$col]=$tmp;
							$where[]=$tk.".".$col." = '@value@'";
							$vars['value'] = $value[$i][$tk][$col];
							//$value[$i][$tk]['status']='set';
							$q = sql::q("SELECT * FROM ".$tk." WHERE ".implode(' AND ',$where)."LIMIT 0 , 30",$vars);
							while ($line = $q->row())
								$data[]=$line;
							if(count($data)>0){
								$value[$i][$tk]['id']=$data[0]['id'];
								$value[$i][$tk]['status']='update';
							}else{
								$value[$i][$tk]['status']='set';
								$value[$i][$tk]['id']=-1;
								//echo "unset<br>";unset($value[$i][$tk]['id']);
							}
						}else{
							$value[$i][$tk]=$value[$i-1][$tk];
						}
					}else{
						if(('price'==$col||'count'==$col||'image'==$col||'phone'==$col)&&($vc!=0)){
							$tmp= $sheet->getCellByColumnAndRow($val[$vc]-1, $i)->getValue();
							if(strlen($tmp)>0)$value[$i][$tk][$col]=$tmp;
							else $value[$i][$tk][$col]=$value[$i-1][$tk][$col];
						}else{
							/*if($value[$i][$col]['id']!=-1){
								$value[$i][$tk][$col]=$value[$i][$col]['id'];$k++;
								$where1[]=$tk.".".$col." = '@value@'";
								$vars1['value'] = $value[$i][$tk][$col];
								if($k>=1){
									if(count($where1)>0){
										$q = sql::q("SELECT * FROM ".$tk." WHERE ".implode(' AND ',$where1)."LIMIT 0 , 30",$vars1);
										while ($line = $q->row())
											$data[]=$line;
										if(count($data)>0){
											$value[$i][$tk]['id']=$data[0]['id'];
											$value[$i][$tk]['status']='update';
										}else{$k--;
											if($k==3){$value[$i][$tk]['status']='set';}//unset($value[$i][$tk]['id']);
										}
									}
								}
							}else{*/
								$value[$i][$tk][$col]=$value[$i][$col]['id'];
							//}
						}
					}
				}
				$data=$where=$vars=$where1=$vars1=[];
				if($tk=='storage'){
					if($value[$i][$tk]['category']==-1){$value[$i][$tk]['status']='set';$value[$i][$tk]['id']=-1;}
					else{$value[$i][$tk]['status']='update';$value[$i][$tk]['id']=-1;}
				}
				/*if($value[$i][$tk]['status'])){
					//$q = sql::add($tk,$value[$i][$tk],array());
					//print_r($q);
					$value[$i][$tk]['id']=$q['start'];
					$value[$i][$tk]['status']='update';
				}else{
					//print_r($value[$tk]);
					$tmp=$value[$i][$tk];
					unset($tmp['status'],$tmp['id']);
					$q = sql::up($tk,$tmp,$tk.".id=".$value[$i][$tk]['id']);
					//print_r($q);
				}*/$k=0;
			}
		}
		for ($i = $val[1]; $i <= $val[2]; $i++){
			//print_r($value[$i]);echo "<br>";
		}
		$this->value=$value;
		return $value;
	}
	public function insorup($index){
		print_r($this->value);
		foreach($index as $v){
			//if($v['val']==true)
				foreach($this->table as $tk=>$cv){
					if($this->value[$v['key']][$tk]['status']=='set'){
						$q = sql::add($tk,$value[$i][$tk],array());
						print_r($q);
					}else{
						$tmp=$value[$v['key']][$tk];
						unset($tmp['status'],$tmp['id']);
						$q = sql::up($tk,$tmp,$tk.".id=".$value[$v['key']][$tk]['id']);
						print_r($q);
					}
				}
		}
	}
}
class loadfile extends parent_loadfile {}