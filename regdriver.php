<?php
require_once("php/user.class.php");
$newuser=new User();
$result=$newuser->registerUser('bob','mypass','','McPhee','bob@bob.com','2015-01-04');
if($result['insert']!=1) {
	echo $result['messages'];
} else {
	echo "New User Added";
}

?>
