<?php
require_once("UserCRUD.class.php");

class UserList {
	private $users=[], $source;
	
	public function __construct() {
		$this->source = new UserCRUD();
		$this->getUserList();
	}
	
	public function getUserList($orderby="email", $style=MYSQLI_ASSOC) {
		$this->users=$this->source->getAllUsers($orderby, $style);
	}
	
	public function __toString() {
		$string="<select name='passengerid'>";
		foreach($this->users as $user) {
			$string.="<option value='".$user['passengerid']."'>".$user['passname']." ".$user['address']."".$user['phoneno'].""."</option>";
		}
		$string.="</select>";
		return $string;
	}
}
?>
