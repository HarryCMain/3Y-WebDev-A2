<!doctype html>
	<head>
	<meta charset ="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />

	</head>
	<body>
		<h1>User Suspended</h1>
		<?php
			require_once("php/page.class.php");
			$page = new Page(1);
		?>
		<nav>
			<ul class="navbar">
				<?php echo $page->getMenu(); ?>
			</ul>
		</nav>
		<?php
echo $page->getUser(); 
?>

	</body>
</html>
