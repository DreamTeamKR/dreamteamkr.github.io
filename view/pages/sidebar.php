<div class="col-sm-3">
	<div class="filters">
		<div class="caption">
			<h2>Фильтры</h2>
		</div>
		<?php 
			$filter_keys = array_keys($filter);
			foreach( $filter_keys as $k ){
				?>
				<div class="filter-widthy">
					<div class="title-wrap">
						<h3><?php echo $filter[$k][0]['characteristic_name'];
								echo(array_search($filter[$k][0]['characteristic_name'],array(' ','Ширина','Длина','Высота'),true)!=false)?', мм :':':';?></h3>
					</div>
				<?php $i=0;
					foreach( $filter[$k] as $v ){
						if(array_search($filter[$k][0]['characteristic_name'],array(' ','Ширина','Длина','Высота'),true)!=false){$i++; if($i>3)break;}?>
							<div class="filter">
								<input type="checkbox" filter_id="<?php echo $v['id'];?>" filter_name="characteristic" group="filter">
								<label for="check-50"><?php echo $v['name'];?></label>
							</div>
				<?php	//}
					} ?>
				</div>
			<?php } ?>
	</div>
</div>