<?php

// čitati https://github.com/tjakopec/OOP_JAVA_PHP_PYTHON_SWIFT

include_once 'Pomocno.php';

// Klasa je opisnik objekta
// Osoba je klasa
class Osoba{
    // OVO NIJE DOBRO
    public $ime;
    public $prezime;

    public function imePrezime(){
        return $this->ime . ' ' . $this->prezime;
    }
}

// objekt je instanca (pojavnost) klase
// $o je objekt
$o = new Osoba();

// s znakom -> pristupamo metodama i svojstvima objekta
$o->ime='Pero';
$o->prezime='Kartaš';
// od PHP 8.2 nije moguće
$o->srednje='KKKKKK';

Pomocno::log($o->imePrezime());

// PHP je interpreter i nama ne treba klasa
// https://www.php.net/manual/en/class.stdclass.php
$o = new stdClass();
$o->ime='Pero';
Pomocno::log($o->ime);