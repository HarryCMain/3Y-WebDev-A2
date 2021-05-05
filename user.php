<!doctype html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />
	</head>
	<body>
		<h1>Welcome User</h1>
		<?php
			require_once("php/page.class.php");
			$page = new Page(2);
		?>
		<nav>
			<ul class="navbar">
				<?php echo $page->getMenu(); ?>
			</ul>
		</nav>
		<?php
echo $page->getUser(); 
?>
<a href="editself.php">Edit Profile</a>
	</body>
</html>
