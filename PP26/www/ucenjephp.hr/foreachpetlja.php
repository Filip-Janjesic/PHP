<?php

$indeksniNiz = [2,3,2,3,2];

for($i=0;$i<count($indeksniNiz);$i++){
    echo $indeksniNiz[$i], '<br>';
}

echo '<hr>';

// ova petlja je ekvivalent gornjoj

foreach($indeksniNiz as $vrijednost){
    echo $vrijednost, '<br>';
}

echo '<hr>';

$asocijativniNiz=[
    'visina'=>12,
    'duzina'=>15,
    'sirina'=>10
];

// ispisuje samo vrijednosti (12,15,10)
foreach($asocijativniNiz as $vrijednost){
    echo $vrijednost, '<br>';
}

echo '<hr>';

//za korištenje i ključeva i vrijednosti ide sintaksa
foreach($asocijativniNiz as $kljuc=>$vrijednost){
    echo 'Ključ ' . $kljuc . ' ima vrijednost ' . $vrijednost, '<br>';
}

echo '<hr>';

// iz niza $_SERVER ispisati sve ključeve i vrijednosti
// koji u dijelu naziva ključa imaju slovo b
$slovo='A';
foreach($_SERVER as $k=>$v){
    //echo $k, ': ', strpos($k,'a'), '<br>';
    if(strpos(strtoupper($k),$slovo)>0){
        echo 'Ključ ' . str_replace($slovo,
        '<span style="font-weight: bold; color: red">' . $slovo . '</span>',strtoupper($k)) 
        . ' ima vrijednost ' . $v, '<br>';
    }
}

// Domaća zadaća (teška): Isti princip primjeniti na vrijednosti - zadržati mala/Velika slova