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
	<h1>Home</h1>	
	<nav>
				<ul class="navbar">
					<?php echo $page->getMenu(); 
					//gets navbar
					?>
				</ul>
			</nav>
	<p><b>*Obi Wan Voice* Hello There!</b></p>
    <footer>Copyright &copy; @Someone 2018</footer>
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