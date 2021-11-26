<?php

try
{
	$connect = new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=pe18011506;charset=utf8', 'pe18011506', 'harrymain');
	//echo 'ok';
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
/*$sql = $connect -> prepare("select * from sailing");
$sql -> execute();  
$result = $sql -> fetch();
var_dump($result); */

$sql = $connect -> prepare("select * from season inner join route on season.seasonid = route.seasonid inner join sailing on route.routeid = sailing.routeid");
			$sql -> execute();  
			$result = $sql -> fetch();
			var_dump($result); 
?>
