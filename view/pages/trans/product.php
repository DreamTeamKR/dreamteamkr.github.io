<div class="row">
	<div class="col-sm-12">
		<div class="title-1">
			<?php
			$title = '';$i=1;
			foreach( $titles as $t) {
				$t = $t . ' > ';
				$title .= (($i<3)? '<a href="/'.$set['site']['url']['base'].(($i==2)?'?p=/search&category='.$data[0]['cid']:'').'">'.$t.'</a>': $t ); 
				$i++;
			}
			echo $title;
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="name-sofa">
			<a onclick="$('#closelook').css('display','block')" class="logo"><h2><?php  echo $data[0]['pname'];?></h2></a>
		</div>
	</div>
</div>
<div class="row">
	<div>
		<div class="col-sm-5">
			<div class="image">
				<img src="/<?php  echo $url['img'].'/products/'.$data[0]['image'].'.jpg'?>" alt="">
			</div>
		</div>
	</div>
	<div class="col-sm-7">
		<div class="characteristic">
			<?php foreach( $data as $k=>$r){
				if($r['chname']!=$tmp){
					echo ($k!=0)?'</p></div>':''?>
					<div class="text-box">
						<h4><?php echo (array_search($r['chname'],array(' ','Ширина','Длина','Высота'))!=false)?$r['chname'].', мм :':$r['chname'].':';?></h4>
						<p><?php echo $r['vname'];?>
			<?php }else { echo ', '.$r['vname'];}
				$tmp=$r['chname'];} ?>
				</p></div>
			<div id="closelook" class="text-box">
				<h4><?php echo "Цена: ";?></h4>
				<p><?php echo $data[0]['price'];?></p>
			</div>
		</div>
	</div>
</div>
