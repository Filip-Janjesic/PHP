<?php

include_once 'Pomocno.php';

class Osoba{
    // Učahurivanje je kada klasa sakrije svoja stvojstva
    // i učini ih dostupnima putem javnih get/set metoda
    
    // skrivena svojstva
    private $ime;
    private $prezime;

    // javne metode
    public function getIme(){
		return $this->ime;
	}

	public function setIme($ime){
		$this->ime = $ime;
	}

	public function getPrezime(){
		return $this->prezime;
	}

	public function setPrezime($prezime){
		$this->prezime = $prezime;
	}

}

$o = new Osoba();
$o->setIme('Pero');

Pomocno::log($o->getIme());