<?php

include_once 'mojeFunkcije.php';

$suma=0;
for($i=1;$i<=100;$i++){
    $suma+=$i;
}

l($suma);

// ulaz $broj je onaj broj koji želimo zbrojit, npr. 100
function zbroji($broj){
    if($broj===1){
        return 1;
    }
    return $broj + zbroji($broj-1);

    //inline if
    //return $broj===1 ? 1 : ($broj + zbroji($broj-1));
}
// ako rekurzija nema uvjet prekida događa se stackoverflow

l(zbroji(10));