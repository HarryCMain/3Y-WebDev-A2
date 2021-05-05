<!doctype html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style/style.css" />
		<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />
	</head>
	<body>
		<h1>Welcome Admin</h1>
		<?php
			require_once("php/page.class.php");
			require_once("php/userlist.class.php");
			$page = new Page(4);
		?>
		<nav>
			<ul class="navbar">
				<?php echo $page->getMenu(); ?>
			</ul>
		</nav>
			<form method="post" action="editother.php">
				<?php
					$userlist = new UserList();
					echo $userlist;
				?>
				<button type="submit">Edit User</button>
			</form>

	</body>
</html>
