<div class="col-sm-5">
	<a href="/<?php echo $url['base'];?>" class="logo">Царь-диван</a>
</div>
<div class="col-sm-7">
	<div class="search">
		<!--<form name="test" method="post" action="/<?php echo $set['site']['url']['base'];?>?p=/search">
			<input name="name" type="text" class="input-text text-awesome" />
			<button class="button-search">
			<div class="text-awesome">
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
		</button>
		</form>
		<input name="search_button" class="fa fa-search button-search" type="submit" value="Поиск" aria-hidden="true" />

		-->
		<input filter_id="name" filter_name="search" group="filter" name="name" type="text" class="input-text text-awesome" />
				<button class="button-search">
			<div class="text-awesome">
				<i name="search_button" class="fa fa-search" aria-hidden="true"></i>
			</div>
		</button>
	</div>
	<a href="/<?php echo $url['base'];?>?p=/downinf">Загрузка файла</a>
</div>