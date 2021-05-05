<!doctype html>
<head>
	<meta charset ="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=yes" />
	<link rel="stylesheet" href="style/style.css" />
	<link rel="stylesheet" type="text/css" media="print" href="style/print.css" />

</head>
<body><?php
require_once("php/user.class.php");
try {
	$name=$_POST['name'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$userpass=$_POST['userpass'];
	$reguser=new User();
	$result=$reguser->registerUser($name,$address,$email,$phone,$userpass);
	if($result['insert']==1) {
		echo "User Registered<br />";
		?>
		<form method="post" action="processlogin.php">
			<label for="email">Email</label><input type="text" name="email" id="email" <?php echo "value='",$email,"' "; ?>/><br />
			<label for="password">Password</label><input type="password" name="userpass" id="userpass" /><br />
			<button type="submit">Login</button>
		</form>
		<?php
		echo "Re-enter your password to login<br/>";
	}	else {
		echo $result['messages'];
		?><a href="javascript:history.back(-1);">Back to Registration Form</a><?php
	}
	
} catch (Exception $e) {
	echo "Error : ", $e->getMessage();
}
?>
</body>
</html>
