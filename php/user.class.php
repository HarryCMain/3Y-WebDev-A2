<?php
require_once("util.class.php");
require_once("UserCRUD.class.php");
require_once("userhash.class.php");
//require_once("dob.class.php");

class User {
	private $userid, $name,$userhash,$address, $lastsession, $email, $phone, $usertype;
	
	public function __construct() {
		$this->userid=-1;
		$this->email="anon@anon.com";
		$this->usertype=1;
		$this->userhash=new UserHash();
		//$this->dob = new DOB();
	}
	
	private function setUserid($userid) {
		$this->userid=$userid;
	}


	
	private function setName($name) {
		$message="";
		if(util::valStr($name)) {
			$this->name=$name;
		} else {$message="Invalid Name<br />";}
		return $message;
		echo "1";
	}

	
	private function setAddress($address) {
		$message="";
		if(util::valStr($address)) {
			$this->address=$address;
		} else {$message="Invalid Address<br />";}
		return $message;
	}
	
private function setEmail($email) {
		$message="";
		if(util::valEmail($email)) {
			$this->email=$email;
		} else {$message="Invalid Email Address<br />";}
		return $message;
	}

	private function setPhone($phone) {
		$message="";
		if(util::valStr($phone)) {
			$this->phone=$phone;
		} else {$message="Invalid Phone Number<br />";}
		return $message;
	}

	
/*private function setDOB($dob) {
		$message="";
		if(!$this->dob->setDOB($dob))
		{ $message.="Date is not correct<br />"; }
		if($this->dob->getAge()<16)
		{ $message.= "User must be 16 years or older<br />";}	
		return $message;
	}*/

private function setPass($password) {
		$message="";
		if($this->userhash->checkRules($password)) {
			$this->userhash->newHash($password);
		} else {
			$message="Password did not meet complexity standards<br />";
		}
		return $message;
	}

	
	private function setSession($session) {
		$this->lastsession=$session;
	}
	
	private function setUsertype($usertype) {
		$this->usertype=$usertype;
	}
	
	public function getUserid() { return $this->userid; }
	public function getName() { return $this->name; }
	public function getAddress() { return $this->address; }
	public function getEmail() { return $this->email; }
	public function getPhone() { return $this->phone; }
	public function getSession() { return $this->lastsession; }
	public function getUsertype() { return $this->usertype; }
	
public function getUserByEmail($email) {
		$haveuser=false;
		$source=new UserCRUD();
		$data=$source->getUserByEmail($email);
		if(count($data)==1) {
			$user=$data[0];
			$this->setUserid($user["passengerid"]);
			$this->setName($user["passname"]);
			$this->setAddress($user["address"]);
			$this->setEmail($user["email"]);
			$this->setPhone($user["phoneno"]);
			$this->userhash->initHash($user["userpass"]);
			$this->setSession($user["lastsession"]);
			$this->setUsertype($user["usertype"]);
			$haveuser=true;
		} 
		return $haveuser;
	}
	public function authNamePass($email, $userhash) {
		$authenticated=$this->getUserByEmail($email);
		if($authenticated) {
			$authenticated=$this->userhash->testPass($userhash);
		}
		return $authenticated;
	}

	/*
	public function getUserByName($userid) {
		$haveuser=false;
		$source=new UserCRUD();
		$data=$source->getUserByName($userid);
		if(count($data)==1) {
			$user=$data[0];
			$this->setUserid($user["userid"]);
			$this->setUsername($user["username"]);
			$this->setFirstname($user["firstname"]);
			$this->setSurname($user["surname"]);
			$this->setSession($user["lastsession"]);
			$this->setEmail($user["email"]);
			$this->setDOB($user["dob"]);
			$this->setUsertype($user["usertype"]);
			$this->userhash->initHash($user["userpass"]);
			$haveuser=true;
		} 
		return $haveuser;
	}
	public function authNamePass($username, $userpass) {
		$authenticated=$this->getUserByName($username);
		if($authenticated) {
			$authenticated=$this->userhash->testPass($userpass);
		}
		return $authenticated;
	}
	*/

public function getUserById($userid) {
		$haveuser=false;
		$source=new UserCRUD();
		$data=$source->getUserById($userid);
		if(count($data)==1) {
			$user=$data[0];
			$this->setUserid($user["passengerid"]);
			$this->setName($user["passname"]);
			$this->setAddress($user["address"]);
			$this->setEmail($user["email"]);
			$this->setPhone($user["phoneno"]);
			$this->userhash->initHash($user["userpass"]);
			$this->setSession($user["lastsession"]);
			$this->setUsertype($user["usertype"]);
			$haveuser=true;
		} 
		return $haveuser;
	}

	public function storeSession($userid, $session="") {
		$result=0;
		$target=new UserCRUD();
		$result=$target->storeSession($userid, $session);
		if($result) {$this->setSession($session);}
		return $result;
	}
	
	public function authIdSession($id, $session) {
		$authenticated=false;
		$authenticated=$this->getUserById($id);
		if($authenticated) {
			if($this->getSession()!=$session) { $authenticated=false; }
		}
		return $authenticated;
	}

	public function registerUser($name,$address,$email,$phone,$password) {
		$insert=0;
		$messages=("");
		$messages.=$this->setName($name);
		$messages.=$this->setAddress($address);
		$messages.=$this->setEmail($email);
		$messages.=$this->setPhone($phone);
		$messages.=$this->setPass($password);
		$target=new UserCRUD();

		if($messages=="") {
			$insert=$target->storeNewUser($this->getName(),$this->getAddress(),$this->getEmail(), $this->getPhone(),$this->userhash->getHash());
			if($insert!=1) { $messages.=$insert;$insert=0; }
		}
		$result=['insert' => $insert,'messages' => $messages];
		return $result;
	}
	public function updateUser($name,$address,$email,$phone,$password,$usertype, $userid) {		
		$update=0;
		$messages="";
		$found=$this->getUserById($userid);
		$target=new UserCRUD();
		if($found) {
			if(util::posted($name)){$messages.=$this->setName($name);}
			if(util::posted($address)){$messages.=$this->setAddress($address);}
			if(util::posted($email)){$messages.=$this->setEmail($email);}
			if(util::posted($phone)){$messages.=$this->setPhone($phone);}
			if(util::posted($password)){$messages.=$this->setPass($password);}
			if(util::posted($usertype)){$messages.=$this->setUsertype($usertype);}
			if($messages=="") {
				$update=$target->updateUser($this->getName(),$this->getAddress(),$this->getEmail(), $this->getPhone(),$this->userhash->getHash(),$this->getUsertype(), $userid);
				if($update!=1) {$messages=$update;$update=0;}
			}			
		}
		$result=['update' => $update, 'messages' => $messages];	
		return $result;
	}

public function __toString() {
		$output="";
		$output.="Name : ".$this->getName()."<br />";
		$output.="Email : ".$this->getEmail()."<br />";
		$typedesc="Anonymous";
		switch($this->getUsertype()) {
			case 0: $typedesc="Suspended";
					break;
			case 1: $typedesc="User";
					break;
			case 2: $typedesc="Priv";
					break;
			case 3: $typedesc="Admin";
			break;
		}
		$output.="Account : ".$typedesc."<br />";
		return $output;
	}
}
?>
