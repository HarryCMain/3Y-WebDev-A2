<?php
require_once("user.class.php");
require_once("menu.class.php");
//require_once("sailing.class.php");


class Page {
	private $user, $pagetype, $isauthenticated, $menu;
	//private $sailings[];
	
	
	public function __construct($pagetype=0){
		session_start();
		$this->setPagetype($pagetype);
		$this->user = new User();
		$this->setStatus(false);
		$this->checkUser();
		$this->menu = new Menu($this->getUser()->getUsertype());
	}
	
	public function getPagetype() { return $this->pagetype;}
	public function getStatus() { return $this->isauthenticated;}
	public function getUser() {return $this->user;}
	public function getMenu() {return $this->menu;}
	
	private function setPagetype($pagetype) {$this->pagetype=(int)$pagetype;}
	private function setStatus($status) {$this->isauthenticated=(bool)$status;}
	
	public function checkUser() {
		if(isset($_SESSION['userid']) && $_SESSION['userid']!="") {
			$this->setStatus($this->getUser()->authIdSession($_SESSION['userid'],session_id()));
		}
		if((!$this->getStatus() && $this->getPagetype()>0) || ($this->getStatus() && $this->getUser()->getUsertype()<$this->getPagetype())) {
			$this->logout();
		}
	}
	
	public function login($email, $userpass) {
		session_regenerate_id();
		echo $email,$userpass;
		if($this->getUser()->authNamePass($email,$userpass)) {
			echo "<br />Authenticated";
			$this->getUser()->storeSession($this->getUser()->getUserid(),session_id());
			$_SESSION['userid']=$this->getUser()->getUserid();
			//echo("session"+$_SESSION);
			// userlevel logic here
			
			switch($this->getUser()->getUsertype()) {
				case 0:
					header("location: suspended.php");
					break;
				case 1:
					header("location: welcome.php");
					break;
				case 2:
					header("location: home.php");
					break;
				case 3:
					header("location: admin.php");
					break;
			}
			exit();
			
		} else {
			echo "<br />Authentication failed";
		}
		
	}
	
	public function logout() {
		if(isset($_SESSION['userid']) && $_SESSION['userid']!="") {
			$this->getUser()->storeSession($_SESSION['userid']);
		}
		session_regenerate_id();
		session_unset();
		session_destroy();
		header("location: login.php");
		exit();
	}

	public function updateUser($name,$address,$email,$phone,$userpass,$usertype,$userid) {
	if($this->getUser()->getUsertype()==3 || $this->getUser()->getUserid()==$userid) {
		$usertoupdate=new User();
		$usertoupdate->getUserById($userid);
		if($this->getUser()->getUsertype()!=3) {
			$usertype="";
		}
		$result=$usertoupdate->updateUser($name,$address,$email,$phone,$userpass,$usertype, $userid);
		return $result;
		
	}
}
/*
public function getSailingList() { return $this->sailings;}

public function getSailings() {
	$havesailings=0;
	$source=new SailingCRUD();
	$sailings=$source->getSailings();
	if(count($sailings)>0) {
		$havesailings=count($sailings);
		foreach($sailings as $sailing) {
			$newsailing=new Sailing();
			$newsailing->initSailing($sailing);
			array_push($this->sailing, $newsailing);
		}
	}
	return $havesailings;
}

public function displaySailings() {
	$output="";
	
	foreach($this->sailings as $sailing) {
		$output.="<sailing>";
		
		$output.="<p>".nl2br(htmlentities($sailing->getContent()))."</p>";
			$output.="<ul class='articlemenu'>";
		if($this->getStatus() && $this->getUser()->getUsertype()>=4) {
			$output.="<li><a href='editsailing.php?aid=".$sailing->getID()."'>Edit Sailing</a></li>";
			$output.="<li><a href='deletesailing.php?aid=".$sailing->getID()."'>Delete Sailing</a></li>";
		}
		if($this->getStatus() && $this->getUser()->getUsertype()>=1) {
			$output.="<li><a href='booktrip.php?sailingid=".$sailing->getID()."'>Book</a></li>";
			$output.="</ul>";
		
		}

		$output.="</div>";
		$output.="</section></sailing>";
	}
	return $output;
}

public function SailingsToArray() {
	$output=[];
	$edit=false;
	$delete=false;
	$book=false;
		if($this->getStatus() && $this->getUser()->getUsertype()>=3) {
			$edit=true;
			$delete=true;
		}
		if($this->getStatus() && $this->getUser()->getUsertype()>=2) {
			$book=true;
		
		}
		$articlearray=$article->toArray();
		$articlearray['book'] = $book;
		$articlearray['edit'] = $edit;
		$articlearray['delete'] = $delete;
		array_push($output,$sailingarray);			
	}
	return $output;
}
*/

		
}?>
