

<?php include('bookingconnection.php');?>

<?php

if (isset($_POST['seasonid'])) {
	
    $this->sql = "select * from route where seasonid=".mysqli_real_escape_string($con,$_POST['seasonid'])." order by departure";
    $this->stmt = self::$db->prepare($this->sql);
    $this->stmt->bind_param("i",$userid);
    $this->stmt->execute();
	$res = mysqli_query($con, $qry);
	if(mysqli_num_rows($res) > 0) {
		echo '<option value="">------- Select -------</option>';
		while($row = mysqli_fetch_object($res)) {
			echo '<option value="'.$row->routeid.'">'.$row->departure.'<h1> to </h1>'.$row->arrival.'</option>';
		}
	} else {
		echo '<option value="">No Record</option>';
	}

} else if(isset($_POST['routeid'])) {

	$qry = "select * from sailings where routeid=".mysqli_real_escape_string($con,$_POST['routeid'])." order by departure";
	$res = mysqli_query($con, $qry);
	if(mysqli_num_rows($res) > 0) {
		echo '<option value="">------- Select -------</option>';
		while($row = mysqli_fetch_object($res)) {
			echo '<option value="'.$row->sailingid.'">'.$row->dateofsailing.'<h1> : </h1>'.$row->departure.'</option>';
		}
	} else {
		echo '<option value="">No Record</option>';
	}
}


	?>