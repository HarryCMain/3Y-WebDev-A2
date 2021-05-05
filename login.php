<!doctype html>
<head>
	<meta charset ="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />

</head>
<body>
	<h1>Login</h1>
	<?php
		require_once("php/page.class.php");
		$page = new Page(0);
	?> 
	<nav>
		<ul class="navbar">
			<?php echo $page->getMenu(); ?>
		</ul>
	</nav>
	<form method="post" action="processlogin.php">
		<label for="email">Email</label><input type="email" name="email" id="email" /><br />
		<label for="password">Password</label><input type="password" name="userpass" id="userpass" /><br />
		<button type="submit">Login</button>
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
