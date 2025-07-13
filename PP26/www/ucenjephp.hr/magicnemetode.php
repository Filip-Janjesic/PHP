<?php

include_once 'Pomocno.php';

//https://www.php.net/manual/en/language.oop5.magic.php

// https://softwarecity.hr/event/php-talks-magije-modernog-php-a/
class Osoba{
    private $ime;
    private $podaci;

    // konstruktor koji se izvodi pozivom ključne riječi new
    public function __construct($ime=''){
        $this->ime = $ime;
        $this->podaci=[];
    }

    public function getIme(){
		return $this->ime;
	}

	public function setIme($ime){
		$this->ime = $ime;
	}

    public function __get($naziv){
        if(isset($this->podaci[$naziv])){
            return $this->podaci[$naziv];
        }else{
            return 'ključ ' . $naziv . ' nije postavljen';
        }
    }

    public function __set($naziv,$vrijednost){
        Pomocno::log($naziv);
        Pomocno::log($vrijednost);
        $this->podaci[$naziv]=$vrijednost;
    }

}

$o = new Osoba('Pero'); //pozvali __construct metodu
$o->prezime='Kartaš'; // poziva se __set naziv=prezime, vrijednost=Kartaš
Pomocno::log($o->getIme()); 
Pomocno::log($o->prezime); // poziva se __get naziv=prezime

Pomocno::log($o->grad);