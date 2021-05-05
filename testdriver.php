<?php
require_once("php/user.class.php");

//getUserByName user exists
$userbob = new User();
if($userbob->getUserByName("bob")) {
	var_dump($userbob);
} else {
	echo "User bob not found <br />";
}
echo "<br />";
//getUserByName User does not exist
$userfred = new User();
if($userfred->getUserByName("fred")) {
	var_dump($userfred);
} else {
	echo "User fred not found <br />";
}
echo "<br />Authentication Tests<br />";
$result=$userbob->authNamePass('bob','password');
echo "Bad password authentication ",($result?'Passed':'Failed'),"<br />";
$result=$userbob->authNamePass('bob2','Pa$$w0rd');
echo "Bad username authentication ",($result?'Passed':'Failed'),"<br />";
$result=$userbob->authNamePass('bob','Pa$$w0rd');
echo "Good username/password authentication ",($result?'Passed':'Failed'),"<br />";



?>
