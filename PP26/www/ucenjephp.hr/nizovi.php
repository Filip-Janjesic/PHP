<?php

// nizovi, array, polja su isoznačnice

$t1=2;
$t2=-2;
$t3=5;

// niz temperatura - ovo je indeksni niz
$t = [1,-1,2,5,6,25,32,15,15,5,1,1];

//stari način - nemojte koristiti
//$t=array(2,2,2,2);
//1. element niza
echo $t[0];
echo '<hr>';
// zadnji element niza
echo $t[count($t)-1];
echo '<hr>';

for($i=0;$i<count($t);$i++){
    echo $t[$i], '<br>';
}

echo '<hr>';
echo '<pre>';
print_r($t);
echo '</pre>';


echo '<hr>';


//asocijativni nizovi
$a = [
    'kljuc'=>'Vrijednost',
    'id'=>2,
    4=>'Pero'
];

// želim ispisati vrijednost 2
echo $a['id'];

echo '<pre>';
print_r($a);
echo '</pre>';

echo '<hr>';

// kombinacija indeksni i asocijativno

$k = [2,2,'id'=>3,9];

echo '<hr>';

echo '<pre>';
print_r($k);
echo '</pre>';

echo '<hr>';

// indeksni nizovi
//jednodimenzionalni niz
$niz = [0,0,0];

//dvodimenzionalni niz
$niz = [
    [0,0,0],
    [0,5,0],
    [0,0,0]
];

echo $niz[1][1];

echo '<hr>';

// definirati niz nxm i sve elemente popuniti s 0

$n=5;
$m=5;
$matrica=[];
for($i=0;$i<$n;$i++){
    $red=[];
    for($j=0;$j<$m;$j++){
        $red[]=1; // u niz red dodaj element s vrijednošću 0
    }
    $matrica[]=$red;
}


for($i=0;$i<$n;$i++){
    for($j=0;$j<$m;$j++){
      echo $matrica[$i][$j] . ' ';
    }
    echo '<br>';
}



