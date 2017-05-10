<div class="col-sm-9">
	<div class="row">
		<div class="col-sm-12">
			<div class="title-1">
				<h2><?php echo $set['interface']['category'];?></h2>
			</div>
		</div>
	</div>
	<?php 
	if( count($data)>0 ){
		$c = 0;
		$row = '<div class="row">';
		foreach( $data as $r){
			echo $row;
			$row = '';
		?>
			<div class="col-sm-4">
				<div class="content-block">
					<a href="/<?php echo $set['site']['url']['base'];?>?p=/search&category=<?php echo $r['cid'];?>" class="img">
						<div class="image">
							<img src="/<?php  echo $url['img'].'/category/'.$r['img'].'.jpg'?>" alt="">
						</div>
						<div class="title">
							<h2><?php echo $r['cname'];?></h2>
						</div>
					</a>
				</div>
			</div>
		<?php	
			if($c>3){
				$c = 0;
				echo '</div>';
				$row = '<div class="row">';
			}
		} 	
	}else{
	?>
		<h4>Ничего не найдено.</h4>	
	<?php } ?>
</div>