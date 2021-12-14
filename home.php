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
<nav class="navbar">
					<div class="navbar-nav">
					<?php echo $page->getMenu(); 
					//gets navbar
					?>
					</div>

		</nav>
			<div id="banner"></div>
			<div class="maincontent">
	<h1>Home</h1>	
	<p><b>Welcome!</b></p>
	<h2>
	Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos interrogantis Cyprii regis inpegit.

Et est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum.

Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.
</h2>
    <footer>Copyright &copy; @Someone 20</footer>
	</div>
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