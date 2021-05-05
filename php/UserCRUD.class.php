<?php
require_once("db.php");
class UserCRUD {
	private static $db;
	private $sql, $stmt;
	
	public function __construct() {
		self::$db = db::getInstance();
	}

	

	public function getUserByEmail($email, $style=MYSQL_ASSOC) {
		$this->sql="select * from passenger where email = ?";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("s",$email);
		$this->stmt->execute();
		$result = $this->stmt->get_result();
		$resultset=$result->fetch_all($style);
		return $resultset;
		echo"Gube";
	}

	

		public function getUserById($userid, $style=MYSQL_ASSOC) {
		$this->sql="select * from passenger where passengerid = ?";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("i",$userid);
		$this->stmt->execute();
		$result = $this->stmt->get_result();
		$resultset=$result->fetch_all($style);
		return $resultset;
		echo"Gubi";
	}
	
	

	public function storeSession($id, $session) {
		$this->sql="update passenger set lastsession=? where passengerid=?;";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("si",$session,$id);
		$this->stmt->execute();
		return $this->stmt->affected_rows;
	}

	

	public function storeNewUser($name,$address,$email,$phone,$userpass) {
		$this->sql="insert into passenger (passname,address,email,phoneno,userpass) values(?,?,?,?,?);";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("sssss",$name,$address,$email,$phone,$userpass);
		$this->stmt->execute();
		if($this->stmt->affected_rows!=1) {
			$errors="";
			if(strpos($this->stmt->error,'email')) {
				$errors.="Email address exists<br />";
			}
			return $errors;
		} else {
			return $this->stmt->affected_rows;
		}
		echo"snu";
	}

	

	public function updateUser($name,$address,$email,$phone,$userpass,$usertype, $userid) {
		$this->sql="update passenger set passname=?, address=?, email=?, phoneno=?, userpass=?, usertype=? where passengerid=?;";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("sssssii",$name,$address,$email,$phone,$userpass,$usertype, $userid);		
		$this->stmt->execute();
		if($this->stmt->affected_rows!=1) {
			$errors="";
			if(strpos($this->stmt->error,'email')) {
				$errors.="Email address exists<br />";
			}
			return $errors;
		} else {
			return $this->stmt->affected_rows;
		}

		echo"uu";

	}
	public function getAllUsers($orderby="email", $style=MYSQL_ASSOC) {
		//nb switch 'whitelist' prevents possibility of injection
		switch ($orderby) {
			case "email": $order="email";
						break;
			case "passengerid": $order="passengerid";
						break;
			default: $order="email";
						break;
		}
		$this->sql="select passengerid, passname, email from passenger order by $order;";
		$this->stmt= self::$db->prepare($this->sql);
		$this->stmt->bind_param("s", $orderby);
		$this->stmt->execute();
		$result=$this->stmt->get_result();
		$resultset=$result->fetch_all($style);
		return $resultset;
		echo"gau";
	}

	

	public function testUserEmail( $email, $style=MYSQL_ASSOC) {
		$this->sql="select * from passenger where email = ?";
		$this->stmt = self::$db->prepare($this->sql);
		$this->stmt->bind_param("s", $email);
		$this->stmt->execute();
		$result = $this->stmt->get_result();
		$resultset=$result->fetch_all($style);
		return $resultset;
		echo"tue";
	}

	




}

//$crudtest=new UserCRUD();
//$result=$crudtest->getUserByName("Bob");
//var_dump($result);

?>