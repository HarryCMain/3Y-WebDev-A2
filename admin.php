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
			//echos admin navbar with advanced edit options
			$page = new Page(4);
		?>
	<nav class="navbar">
					<div class="navbar-nav">
					<?php echo $page->getMenu(); 
					//gets navbar
					?>
					</div>

		</nav>
			<form method="post" action="editother.php">
				<?php
					//lists all users
					$userlist = new UserList();
					echo $userlist;
				?>
				<button type="submit">Edit User</button>
			</form>

	</body>
</html>
