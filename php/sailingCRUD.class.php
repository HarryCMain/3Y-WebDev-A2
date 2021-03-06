<?php
require_once("db.php");
class SailingCRUD {
	private static $db;
	private $sql, $stmt;
	
	public function __construct() {
		self::$db = db::getInstance();
    }
    
    public function getAllSailings() {
		//nb switch 'whitelist' prevents possibility of injection
		$this->sql="select * from sailing";
		$this->stmt= self::$db->prepare($this->sql);
		$this->stmt->execute();
		$result=$this->stmt->get_result();
		$resultset=$result->fetch_all($style);
		return $resultset;
	}

	public function getSailingByID($sailingid, $style=MYSQL_ASSOC) {
		$this->sql="select * from sailing where sailingid = ?";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("i",$sailingid);
		$this->stmt->execute();
		$result = $this->stmt->get_result();
		$resultset=$result->fetch_all($style);
		return $resultset;
		echo"Gsbi";
	}
}