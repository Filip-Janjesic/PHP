<?php

// korištenje naq stari način
require_once 'mojeFunkcije.php';

l([2,3,4]);



// korištenje na OOP način
require_once 'Pomocno.php';
// https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php

// pozivam metodu na samoj klasi
// takva metoda mora biti static
Pomocno::log([8,3,4]);

// ovo neće raditi jer ovo znači da pozivam metodu na instanci klase
// takva metoda neće biti static
$p = new Pomocno();
$p->setIme('Pero');
//sleep(5);
$p->ispis(2);

echo Pomocno::validOib('98864571283') ? 'OK' : 'NE';


// prijedlog javnog PHP repozitorija na gitu
// generiranje n OIB valjanih brojeva prem https://regos.hr/app/uploads/2018/07/KONTROLA-OIB-a.pdf

