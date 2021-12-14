<!doctype html>
<head>
	<meta charset ="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
	<?php require_once ("php/page.class.php");
	$page = new Page(0);
	?>
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />

</head>
<body>
	<div id="banner"></div>
	<h1>About</h1>	
	
		<p>About us</p>
		<nav class="navbar">
					<div class="navbar-nav">
					<?php echo $page->getMenu(); 
					//gets navbar
					?>
					</div>

		</nav>
		
		<h1><b>we don't exist so you can't tell our past</b></h1>


    <footer>Copyright &copy; Someone 2021</footer>
</body>
</script>
<script src="js/touch.js"></script>
<script>
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		var mytouchhandler=new TouchScaler(["#mainheader",".navbar","main"]);
	}
}
</script>

</html>