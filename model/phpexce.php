<?php defined('droot') OR die('No direct script access.');
require_once ('Classes/PHPExcel/IOFactory.php');
class  parent_phpexce{
	public $db_id = null;
	public $table = array('category','contragent','characteristic','product','category_characteristic','value','storage_characteristic','storage');
	public $q_res = null;
	public function __construct(){
		return new phpexce();
	}
	public static function download($file){
		$xls = PHPExcel_IOFactory::load($file["tmp_name"]);
		$xls->setActiveSheetIndex($_POST['num']-1);
		$sheet = $xls->getActiveSheet();
		
		echo "<table>"; 
		for ($i = $_POST['from']; $i <= $_POST['to']; $i++) {  
			$value=array();
			echo "<tr>";
				$value['Назва'] = $sheet->getCellByColumnAndRow($_POST['name']-1, $i)->getValue();
				echo "<td>".$value['Назва']."</td>";
				$value['Ширина'] = $sheet->getCellByColumnAndRow($_POST['with']-1, $i)->getValue();
				echo "<td>".$value['Ширина']."</td>";
				//$Col=2;
				$value['Длина'] = $sheet->getCellByColumnAndRow($_POST['length']-1, $i)->getValue();
				echo "<td>".$value['Длина']."</td>";
				//$Col=7;
				$value['Высота'] = $sheet->getCellByColumnAndRow($_POST['hight']-1, $i)->getValue();
				echo "<td>".$value['Высота']."</td>";
				//$Col=8;
				$value['Производитель'] = $sheet->getCellByColumnAndRow($_POST['contragent']-1, $i)->getValue();
				echo "<td>".$value['Производитель']."</td>";
				//$Col=2;
				$value['Форма'] = $sheet->getCellByColumnAndRow($_POST['form']-1, $i)->getValue();
				echo "<td>".$value['Форма']."</td>";
				//$Col=8;
				$value['Механизм трансформации'] = $sheet->getCellByColumnAndRow($_POST['mechanism']-1, $i)->getValue();
				echo "<td>".$value['Механизм трансформации']."</td>";
				//$Col=7;
				$value['Наполнение'] = $sheet->getCellByColumnAndRow($_POST['stuff']-1, $i)->getValue();
				echo "<td>".$value['Наполнение']."</td>";
				//$Col=8;
				$value['Обивка'] = $sheet->getCellByColumnAndRow($_POST['casing']-1, $i)->getValue();
				echo "<td>".$value['Обивка']."</td>";
				//$Col=1;
				$value['Дополнительно'] = $sheet->getCellByColumnAndRow($_POST['addition'], $i)->getValue();
				echo "<td>".$value['Дополнительно']."</td>";
			echo "</tr>";
/*				$q = sql::add("category,array('name'=>$value['category']),array();
				*/
		}
		echo "</table>";
	}
	public static function banknotes(){
		$money = array( 50=>true,100=>true,200=>true,500=>true,1000=>true,2000=>true );
		$q = sql::q("SELECT * FROM  `a_money` WHERE cur='@cur@'",array('cur:s'=>'dollar'));
		$a_money = array();
		$total = 0;
		while ( $r = $q->row() ){
			$a_money[$r['par']]['count'] = $r['count']; 
			$a_money[$r['par']]['par'] = $r['par']; 
			$a_money[$r['par']]['total'] = $r['par']*$r['count'];
			$total += $a_money[$r['par']]['total'];
		}
		foreach( $money as $k => $v){
			foreach( $a_money as $ak => $av){
				if( ($k == $ak and $av['total']>=$k) or $k<=$total or $k<=$av['total']){
					break;
				}else{
					$money[$k] = false;
				}
			}
		}
		return $money;
	}
	public static function withdraw( $sum ){
		$res = array();
		if( $sum ){
			//$sum = $_REQUEST['s'];
			$cur = 'dollar';
			$q = sql::q("SELECT * FROM `a_money` WHERE cur='@cur@' order by `par` DESC",array('cur:s'=>'dollar'));
			$total = 0;
			while ( $r = $q->row() ){
				$a_money[$r['cur']][$r['par']]['count'] = $r['count']; 
				$a_money[$r['cur']][$r['par']]['par'] = $r['par']; 
				$a_money[$r['cur']][$r['par']]['total'] = $r['par']*$r['count'];
				$total += $a_money[$r['cur']][$r['par']]['total'];
			}
			$m = array_keys($a_money[$cur]);
			if($total >= $sum and ($sum % $m[count($m)-1])==0){
				//print_r($a_money);
				while( $sum > 0 ){
					foreach ( $m as $r ){
						if( $sum >= $r ){
							$count_par = ((int)($sum / $r));
							if( $count_par > 1)
								$count_par = (int)($count_par/2);
							echo "<br>--> sum=$sum;r=$r;--".($sum / $r)."==$count_par";
							if( $a_money[$cur][$r]['count'] >= $count_par){
								$a_money[$cur][$r]['count'] -= $count_par;
								$sum -= $count_par * $r;
								if(isset($res[$r])){
									$res[$r] += $count_par;
								}else{
									$res[$r] = $count_par;
								}
							}
							
						}
					}
				}
				//print_r($a_money);
				//echo "$sum % ".$m[0]." == 0;".($sum % $m[0]).";".$m[count($m)-1];
			}else{
				echo "!9!!";
			}
		}
		return $res;
	}
	
	public static function addFunds($sum, $num = false){
		$num = ($num == false?sess::login()->user['id']:$num);
		sql::q("UPDATE `b_users` SET  `amount` = `amount`+'@sum@' WHERE `id` = @id@",array('sum' => $sum,'id:i' => $num));
	}
	
	public static function sendFunds($sum,$num){
		sql::q("UPDATE `b_users` SET  `amount` = `amount`-'@sum@' WHERE `id` = @id@",array('sum' => $sum,'id:i' => sess::login()->user['id']));
		transaction::addFunds($sum,$num);
	}
}
class phpexce extends parent_phpexce {}