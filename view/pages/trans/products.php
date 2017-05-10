<div class="col-sm-9">
	<div class="row">
		<div class="col-sm-12">
			<div class="title-1">
				<?php 
				$title = '';
				foreach( $titles as $t) {
					$t = $t . ' > ';
					$title .= ( empty($title)? '<a href="/'.$set['site']['url']['base'].'">'.$t.'</a>': $t ); 
				}
				echo $title; 
				?>
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
					<a href="/<?php echo $set['site']['url']['base'];?>?p=/product&prod=<?php echo $r['id'];?>" class="img">
						<div class="image">
							<img src="/<?php  echo $url['img'].'/products/'.$r['img'].'.jpg'?>" alt="">
						</div>
						<div class="title">
							<h2><?php echo $r['name'];?></h2>
							<a href="/<?php echo $set['site']['url']['base'];?>?p=/search&category=<?php echo $r['cid'].'">'.$r['cname'];?></a>
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
		Ничего не найдено.
	<?php
	}
	?>
</div>