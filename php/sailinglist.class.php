<?php
require_once("sailingCRUD.class.php");

class SailingsList {
	private $sailings=[], $source;
	
	public function __construct() {
		$this->source = new SailingCrud();
		$this->getUserList();
	}
	
	public function getUserList($orderby="sailingid", $style=MYSQLI_ASSOC) {
		$this->sailings=$this->source->getAllSailings($orderby, $style);
	}
	
	public function __toString() {
		$string="<select name='sailingid'>";
		foreach($this->sailings as $res) {
			$string.="<option value='".$res['sailingid']."'>".$res['dateofsailing']." ".$res['departuretime']."".$res['arrivaltime']."".$res['capacity']."".$res['nreserved']."".$res['routeid'].""."</option>";
		}
		$string.="</select>";
		return $string;
	}
}
?>
