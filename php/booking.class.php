<?php
if(file_exists('connectionDB.php'))
    include 'connectionDB.php';
else if(file_exists('../connectionDB.php'))
	include '../connectionDB.php';

class Booking{
	private $id;
	private $dateBooking;
	private $state;
	private $idUser;
	private $idTrip;
	private $adress;
	private $postalCode;
	private $town;
	private $telephone;
	private $mobile;
	private $nationality;
	private $englishLevel;
	private $emergencyName;
	private $emergencyContact;
	private $academicQual;
	private $profession;
	private $textAdmission;
	private $name;
	private $email;
	private $dateBirth;



	function __construct($idParam){
		global $con;
		$query = $con -> prepare('SELECT * FROM booking WHERE id = :id');
	    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
	    $query -> execute();
	    $data = $query -> fetch();
	    $this -> id = $data['id'];
	    $this -> dateBooking = $data['dateBooking'];
	    $this -> state = $data['state'];
	    $this -> idUser = $data['idUser'];
	    $this -> idTrip = $data['idTrip'];
	    $this -> adress = $data['adress'];
	    $this -> postalCode = $data['postalCode'];
	    $this -> town = $data['town'];
	    $this -> telephone = $data['telephone'];
	    $this -> mobile = $data['mobile'];
	    $this -> nationality = $data['nationality'];
	    $this -> englishLevel = $data['englishLevel'];
	    $this -> emergencyName = $data['emergencyName'];
	    $this -> emergencyContact = $data['emergencyContact'];
	    $this -> academicQual = $data['academicQual'];
	    $this -> profession = $data['profession'];
	    $this -> textAdmission = $data['textAdmission'];
	    $this -> name = $data['name'];
	    $this -> email = $data['email'];
	    $this -> dateBirth = $data['dateBirth'];
	}

	function getId(){
		return $this -> id;
	}

	function getDateBooking(){
		return $this -> dateBooking;
	}

	function getState(){
		return $this -> state;
	}

	function getIdUser(){
		return $this -> idUser;
	}

	function getIdTrip(){
		return $this -> idTrip;
	}

	function getAdress(){
		return $this -> adress;
	}

	function getPostalCode(){
		return $this -> postalCode;
	}

	function getTown(){
		return $this -> town;
	}

	function getTelephone(){
		return $this -> telephone;
	}

	function getMobile(){
		return $this -> mobile;
	}

	function getNationality(){
		return $this -> nationality;
	}

	function getEnglishLevel(){
		return $this -> englishLevel;
	}

	function getEmergencyName(){
		return $this -> emergencyName;
	}

	function getEmergencyContact(){
		return $this -> emergencyContact;
	}

	function getAcademicQual(){
		return $this -> academicQual;
	}

	function getProfession(){
		return $this -> profession;
	}

	function getTextAdmission(){
		return $this -> textAdmission;
	}

	function getName(){
		return $this -> name;
	}

	function getEmail(){
		return $this -> email;
	}

	function getDateBirth(){
		return $this -> dateBirth;
	}
	/*
	function setLastName($newLastName,$id){
		global $bdd;
		$query = $bdd -> prepare('UPDATE Volunteer set lastName = :lastName WHERE id = :id');
	    $query -> bindValue(':lastName',$newLastName);
	    $query -> bindValue(':id',$id);
	    $query -> execute();
	    $this -> lastName = $newLastName;
	}

	function setFirstName($newFirstName,$id){
		global $bdd;
		$query = $bdd -> prepare('UPDATE Volunteer set firstName = :firstName WHERE id = :id');
	    $query -> bindValue(':firstName',$newFirstName);
	    $query -> bindValue(':id',$id);
	    $query -> execute();
	    $this -> firstName = $newFirstName;
	}

	function setAge($newAge,$id){
		global $bdd;
		$query = $bdd -> prepare('UPDATE Volunteer set age = :age WHERE id = :id');
	    $query -> bindValue(':age',$newAge);
	    $query -> bindValue(':id',$id);
	    $query -> execute();
	    $this -> age = $newAge;
	}

	function setPassword($newPassword,$id){
		global $bdd;
		$query = $bdd -> prepare('UPDATE Volunteer set password = :password WHERE id = :id');
	    $query -> bindValue(':password',md5($newPassword));
	    $query -> bindValue(':id',$id);
	    $query -> execute();
	    $this -> password = $newPassword;
	}*/

}

?>