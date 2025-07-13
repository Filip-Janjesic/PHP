<?php

include_once 'Pomocno.php';

// APstrakna klasa je ona koja ne može imati instancu
// Koristi se da bi ju druge klase nasljedile
abstract class Osoba{
    private $ime;
    protected $status; // ovo vide sve klase koje nasljede klasu Osoba

    public function __construct($ime=''){
        $this->ime = $ime;
    }

    public function getIme(){
		return $this->ime;
	}

	public function setIme($ime){
		$this->ime = $ime;
	}

    public function __toString(){
        return $this->ime;
    }


}

class Polaznik extends Osoba{
    
    private $brojUgovora;

    public function __construct($ime='',$brojUgovora=''){
        parent::__construct($ime);
        // ime sam mogao i ovako postaviti ali bolje je pozvati konstruktor nadklase (linija iznad)
        //$this->setIme($ime);
        $this->brojUgovora = $brojUgovora;
        $this->status=1;
    }

    public function getBrojUgovora(){
		return $this->brojUgovora;
	}

	public function setBrojUgovora($brojUgovora){
		$this->brojUgovora = $brojUgovora;
	}

    // override
    public function setIme($ime){
		parent::setIme($ime . ' Pregaženo');
	}
}

class Predavac extends Osoba{
    
    private $iban;

    public function __construct($ime='',$iban=''){
        parent::__construct($ime);
        // ime sam mogao i ovako postaviti ali bolje je pozvati konstruktor nadklase (linija iznad)
        //$this->setIme($ime);
        $this->iban = $iban;
        $this->status=2;
    }

    public function getIban(){
		return $this->iban;
	}

	public function setIban($iban){
		$this->iban = $iban;
	}

    public function __toString(){
        return $this->status . ': ' . $this->getIme();
    }


}


class Ravnatelj extends Osoba{
}


$polaznik = new Polaznik('Pero','12/2023');
$polaznik->setIme('Karlo');

Pomocno::log($polaznik->getIme());

$predavac = new Predavac('Marija','1545454578787');
$predavac->setIme('Zrinka');
// ovo ne može
//$predavac->status=3;

echo $predavac;
echo '<hr>';
echo $polaznik;



