<?php 

// sve isto kao i while uz iznimku
// do while će se minimalno jednom izvesti

// uvjet se provjerava na kraju petlje

$uvjet=false;

do{
    echo 'Osijek';
}while($uvjet); //provjera uvjeta je na kraju petlje


while($uvjet){ //provjera uvjeta je na početku petlje
    echo 'Zagreb';
};

// beskonačna while petlja
do{
    //ovo će se izvesti
break;
// ovo se neće izvesti
}while(true);