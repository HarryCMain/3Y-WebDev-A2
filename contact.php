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
	
		<p>Contact us</p>
			<nav>
				<ul class="navbar">
					<?php echo $page->getMenu(); ?>
				</ul>
			</nav>
		
		<h1><b>we don't exist so you can't contact us</b></h1>


    <footer>Copyright &copy; Someone 2018</footer>
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