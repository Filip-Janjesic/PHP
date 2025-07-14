<?php

//Proučiti pojam rekurzija. Riješiti zadatak zbrajanja prvih 100 brojeva rekurzijom.

function Rekurzija(int $OdBroja, int $DoBroja, int $rezultat=0)
{
    if($OdBroja <= $DoBroja){
        Rekurzija($OdBroja+1, $DoBroja, $retultat=$rezultat+$OdBroja); 
    }else{
        echo $rezultat;
    }
}

Rekurzija(0,100);

//test
// Testing pull

echo '<hr>';

