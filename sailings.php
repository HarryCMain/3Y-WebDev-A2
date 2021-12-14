<!doctype html>
<head>
	<meta charset ="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />
	<title>Sailings</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.min.js"></script>

</head>
<body>
	<?php
			require_once("php/page.class.php");
			require_once("php/sailinglist.class.php");
			$page = new Page(0);
		?>
		<nav class="navbar">
					<div class="navbar-nav">
					<?php echo $page->getMenu(); 
					//gets navbar
					?>
					</div>

		</nav>
    <main>
	<h1>Sailings</h1>
        
                <h3 align="">Sailings</h3><br />                 
                <form method="post" action="booksailing.php">
				<?php
					$userlist = new SailingsList();
					echo $userlist;
				?>
				<button type="submit">Book Sailing</button>
		</main>

    <footer>Copyright &copy; Someone 2020</footer>
</body>
<script src="js/touch.js"></script>
<script>
</body>
</html>