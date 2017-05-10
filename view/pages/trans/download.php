<div class="filters" width="1500px">
	<div class="caption">
		<h2>Подтвердите</h2>
	</div>
	<div class="filter-widthy">
		<table><?php 
			echo '<tr class="filter"><td><p> </p></td>';
				foreach( $data[key($data)] as $table=>$val){
					if(array_search($table,array('','category_characteristic','storage_characteristic'),true)==false){
						echo "<td colspan=".(count($val)-1).' class="td-border-right"><p>'.$table."</p></td>";
					}
				}
			echo "</tr>";
			echo '<tr class="filter"><td><p> </p></td>';
				foreach( $data[key($data)] as $table=>$val){
					if(array_search($table,array('','category_characteristic','storage_characteristic'),true)==false){
						foreach($val as $colum=>$v){
							if($v!=''&&$colum!='status'&&$colum!='id')echo "<td><p>".$colum."</p></td>";
						}
						echo '<td class="td-border-right"><p>status</p></td>';
					}
				}
			echo "</tr>";
			foreach( $data as $q=>$i ){?>
				<tr class="filter">
					<td><input type="checkbox" filter_id="<?php echo $q;?>" filter_name="load" group="load"></td>
					<?php foreach( $i as $table=>$val){
						if(array_search($table,array('','category_characteristic','storage_characteristic'),true)==false){
							foreach($val as $colum=>$v){
								if($v!=''&&$colum!='status'&&$colum!='id')echo '<td class="td-border"><p>'.$v.'</p></td>';
							}
							echo '<td class="td-border"><p>'.$val['status'].'</p></td>';
						}
					} ?>
				</tr>
			<?php } ?>
		</table>
		<input name="load_button" class="button" type="submit" value="Загрузить"/>
		<div id="send"></div>
	</div>
</div>