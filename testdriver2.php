<?php
require_once("php/user.class.php");

// Session tests
session_start();
session_regenerate_id();
$userbob=new User();
$result=$userbob->authNamePass('bob','Pa$$w0rd');

echo "Good username/password authentication ",($result?'Passed':'Failed'),"<br />";
$sessionresult=false;
if($result) { 
	echo "storing session ",session_id()," for user bob<br />";
	$_SESSION['userid']=$userbob->getUserid();
	$sessionresult=$userbob->storeSession($userbob->getUserid(),session_id());
}
if($sessionresult) {echo "Session saved<br />"; }
else { "Session was not saved<br />"; }
// test session check
if(isset($_SESSION['userid'])) {
	echo "check userid for session<br />";
	$sessionauth=$userbob->authIdSession($_SESSION['userid'],session_id());
	if($sessionauth) {echo "Session authenticated<br />";}
	else { "Session was not authenticated<br />";}
} else {
	echo "No active user<br />";
}

// logout and session check - no session passed so clears the session using default
$sessionresult=$userbob->storeSession($userbob->getUserid());
// clear all session vars and restart session
session_unset();
session_destroy();
session_start();
// test session check
if(isset($_SESSION['userid']) && $_SESSION['userid']!="") {
	echo "check userid for session<br />";
	$sessionauth=$userbob->authIdSession($userbob->getUserid(),session_id());
	if($sessionauth) {echo "Session authenticated<br />";}
	else { echo "Session was not authenticated<br />";}
} else {
	echo "No active user<br />";
}

?>

