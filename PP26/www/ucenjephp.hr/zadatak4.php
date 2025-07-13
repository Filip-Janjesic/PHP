<?php

// stranica prima dva broja putem GET parametara
// U slučaju da je prvi broj manji 
// ispisuje njihov umnožak
// inače ispisuje njihovu razliku


$b1 = isset($_GET['b1']) ? $_GET['b1'] : 0;
$b2 = isset($_GET['b2']) ? $_GET['b2'] : 0;

if($b1<$b2){
    echo $b1*$b2;
}else{
    echo $b1-$b2;
}

echo $b1<$b2 ? $b1*$b2 : $b1-$b2;