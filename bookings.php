<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bookings</title>
<?php
            require_once("php/page.class.php");
			require_once('php/db.php');
			$page = new Page(1);
			
		?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="booking.js"></script>




<style>
/*body { background-color: #0a5656 }*/
.post-title { font-size:20px; }
.mtb-margin-top { margin-top: 20px; }
.top-margin { border-bottom:2px solid #ccc; margin-bottom:20px; display:block; font-size:1.3rem; line-height:1.7rem;}
.btn-success {
	cursor:pointer;
}

label {
	display: block;
	width:100%;
}

</style>
</head>

<body>
<h1>Sailings</h1>

		<nav>
			<ul class="navbar">
				<?php  echo $page->getMenu(); ?>
			</ul>
		</nav>




    <div class="container-fluid">
    	<div class="row">

			<div class="col-xs-12 col-md-sm-6 col-md-3">
				<label>Season:</label>


			 
			<form>
			<?php

			echo("ola");

			//$this->sql="select * from passenger where passengerid = ?";
			//$this->stmt = self::$db->prepare($this->sql);
			//$this->stmt->bind_param("i",$userid);
		//	$this->stmt->execute();
		//	$result = $this->stmt->get_result();
		//	$resultset=$result->fetch_all($style);
		//	return $resultset;

			$sql = "select seasonid, startdate from season";
			$stmt = self::$db->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			$resultseason=$result->fetch_all($style);

		//	$sqlseason = $connect -> prepare("select seasonid, startdate from season");
			//		$sqlseason -> execute(); 
			//	$resultseason = $sql -> fetch();
			//	error_log("where",0);
	echo $resultseason;
			echo"	<select id='season' onChange='check(this);'>";
			while($row_season = mysqli_fetch_array($resultseason))
			{
				echo "<option value='".$row_season['seasonid']."'>".$row_season['startdate']."</option>";
			}
			echo"	</select>";
			?>
				<select id="route" disabled="disabled" onChange="checkrt(this)">
					<option>Please select box 1 first</option>
				</select>

				<select id="sailing" disabled="disabled">
					<option>Please select box 2 first</option>
				</select>
			</form>

		</div>
	</div>
	<footer>Copyright &copy; Someone 2021</footer>
</body>

<script>
function check(elem) {
   $("#route").html(" \
        <option>Option 1</option> \
        <option>Option 2</option> \
        <option>Option 3</option> \
        <option>Option 4</option> \
"); 
  $('#route').removeAttr("disabled")
}


function checkrt(elem) {
   $("#sailing").html(" \
        <option>Option 1</option> \
        <option>Option 2</option> \
        <option>Option 3</option> \
        <option>Option 4</option> \
"); 
  $('#sailing').removeAttr("disabled")
}
</script>
</html>
