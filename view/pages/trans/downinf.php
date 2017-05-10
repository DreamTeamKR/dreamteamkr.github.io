<?php global $set ?>
<div class="col-sm-12">
			<?php global $set ?>
			<form action="/<?php echo $set['site']['url']['base'];?>?p=/download" method="post" enctype="multipart/form-data">
				<p class="maintext"> Загрузите файл</p>
				<p><input class="button" type="file" name="filename" accept=".xls,.json,.xml"></p>
				<p class="comment">Введите номер листа  <input type="text" name="val[]" placeholder="номер листа" value="1"></p>
				<p class="maintext">Введите соответствующее количество строк в файле</p>
				<p class="comment">От  <input type="text" name="val[]" placeholder="от" value="1">
				До  <input type="text" name="val[]" placeholder="до" value="2"></p>
				<p class="maintext">Введите соответствующий столбик в файле</p>
				<div class="line"><p class="comment">Названия категорий</p><input type="text" name="val[]" placeholder="категория" value="1"></div>
				<div class="line"><p class="comment">Имена файлов картинок</p><input type="text" name="val[]" placeholder=".jpg" value="2"></div>
				<div class="line"><p class="comment">Названия мебели</p><input type="text" name="val[]" placeholder="мебель" value="3"></div>
				<div class="line"><p class="comment">Имена файлов картинок</p><input type="text" name="val[]" placeholder=".jpg" value="4"></div>
				<div class="line"><p class="comment">Цена</p><input type="text" name="val[]" placeholder="цена" value="5"></div>
				<div class="line"><p class="comment">Количество</p><input type="text" name="val[]" placeholder="количество" value="6"></div>
				<div class="line"><p class="comment">Названия характеристик</p><input type="text" name="val[]" placeholder="назв. хар." value="7"></div>
				<div class="line"><p class="comment">Параметры характеристики</p><input type="text" name="val[]" placeholder="параметр" value="8"></div>
				<div class="line"><p class="comment">Название производителя</p><input type="text" name="val[]" placeholder="поставщик" value="9"></div>
				<div class="line"><p class="comment">Телефон</p><input type="text" name="val[]" placeholder="телефон" value="10"></div>
				<p><input class="button" type="submit" value="Загрузить"></p>
			</form>
		</div>