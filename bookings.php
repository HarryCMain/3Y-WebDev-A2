<!doctype html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bookings</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="booking.js"></script>


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
	<?php
            require_once("php/page.class.php");
			require_once('php/db.php')
			//$page = new Page(1);
		?>
		<nav>
			<ul class="navbar">
				<?//php echo $page->getMenu(); ?>
			</ul>
		</nav>




    <div class="container-fluid">
    	<div class="row">

			<div class="col-xs-12 col-md-sm-6 col-md-3">
				<label>Season:</label>
				<!--<select name="season" class="form-control" id="season">
					<option value=''>------- Select --------</option>
					<?php 
					//$sql = $connect -> prepare("select seasonid, startdate from season");
					//$sql -> execute();  
					//$result = $sql -> fetch();
					//if(count($result) > 0) {
					//	foreach($result as $row) {
						//	var_dump($row)
					//		echo "<option value='".$row->['seasonid']."'>".$row->['startdate']."</option>";
					//	}
				//	}
					?>
				</select>
			</div>

			<div class="col-xs-12 col-md-sm-6 col-md-3">
				<label>Route :</label>
				<select name="route" class="form-control" id="route" disabled="disabled"><option>------- Select --------</option></select>
			</div>


			<div class="col-xs-12 col-md-sm-6 col-md-3">
				<label>Sailing :</label>
				<select name="sailing" class="form-control" id="sailiing" disabled="disabled"><option>------- Select --------</option></select>
			</div>
			-->

			 
			<form>
			<?php

			$sql = $connect -> prepare("select seasonid, startdate from season");
					$sql -> execute(); 
					$result = $sql -> fetch();

					echo $result;
			echo"	<select id='season' onChange='check(this);'>
					<option>No</option>
					<option>Yes</option>
				</select>";
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
	<footer>Copyright &copy; Someone 2020</footer>
</body>
</html>
