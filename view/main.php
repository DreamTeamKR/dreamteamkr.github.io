<!DOCTYPE html>
<html lang="en">
	<title>
	Царь-диван
	</title>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title; ?></title>
		<meta name="keywords" content="<?php echo $keywords ?>" />
		<meta name="description" content="<?php echo $description; ?>" />
		<!-- include -->
		<?php foreach($styles as $style): ?>
		<link href="/<?php  echo $url['css'].$style; ?>.css" rel="stylesheet" type="text/css" />
		<?php endforeach; ?>
		<?php foreach($jscripts as $jscript): ?>
		   <script type="text/javascript" src="/<?php echo $url['js'].$jscript; ?>.js"></script>
		<?php endforeach; ?> 
		<!-- include End-->
	</head>

	<body>
		<header>
			<div class="container">
				<div class="row">
					<?php echo$header;?>
				</div>
			</div>
		</header>
		<main>
			<div class="container">
				<div class="row">
					<?php echo$sidebar;?>
					<?php echo $content;?>
				</div>
			</div>
		</main>
	</body>
</html>