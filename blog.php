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
	<h1>Blog</h1>	
	
		<p>Blog</p>
			<nav>
				<ul class="navbar">
					<?php echo $page->getMenu(); ?>
				</ul>
			</nav>
		<main>
			<?php
				$now=new DateTime();
				$page->getArticles($now->format("Y-m-d H:i:s O"), 2, "DESC");
				echo $page->displayArticles();
			?>
		</main>

    <footer>Copyright &copy; Someone 2020</footer>
</body>
<script src="js/article.js"></script>
<script src="js/touch.js"></script>
<script>
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		var articlehandler=new Article("main");
		var mytouchhandler=new TouchScaler(["#mainheader",".navbar","main"]);
	}
}
</script>

</html>