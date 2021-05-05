<!doctype html>
<head>
	<meta charset ="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />

</head>
<body>
	<?php
		require_once("php/page.class.php");
		$page = new Page(0);
	?>
	<nav>
		<ul class="navbar">
			<?php echo $page->getMenu(); ?>
		</ul>
	</nav>
	<script src="js/userform.js"></script>
<form method="post" id="regform" action="reguser.php">
<label for="name">Name</label><input type="text" id="name" name="name" required /><br />
<label for="address">Address</label><input type="text" id="address" name="address" required /><br />
<label for="email">Email</label><input type="email" id="email" name="email" required /><br />
<label for="phone">Phone</label><input type="text" id="phone" name="phone" required /><br />
<label for="userpass">Password</label><input type="password" id="userpass" name="userpass" required /><br />
<button type="submit" id="submit">Register</button>
</form>
</body>
<script src="js/touch.js"></script>
<script>
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		var mytouchhandler=new TouchScaler(["#mainheader",".navbar","main"]);
	}
}
</script>
</html>
