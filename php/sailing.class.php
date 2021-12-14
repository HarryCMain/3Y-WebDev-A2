<?php
require_once("sailingCRUD.class.php");

class sailing {
	private $sailingid, $dateofsail,$departuretime,$arrivaltime, $capacity, $nreserved, $routeid;
	private $sailings=[];

	public function __construct($sailingid) {
		$this->getSailingByID($sailingid);
                //class constructor
    }

    public function getSailingID() { return $this->sailingid; }
	public function getDateofsail() { return $this->dateofsail; }
	public function getDepartureTime() { return $this->address; }
	public function getArrivaltime() { return $this->arrivaltime; }
	public function getCapacity() { return $this->capacity; }
	public function getReserved() { return $this->nreserved; }
    public function getRouteID() { return $this->routeid; }


    private function getSailingByID($sailingid) {
        $source=new SailingCRUD();
        $this->sailings=$source->getSailingByID($sailingid);
    }

}
?>