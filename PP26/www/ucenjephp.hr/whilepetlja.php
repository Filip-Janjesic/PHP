<?php

// while radi s boolean tipom podatka
$uvjet=false;
$t=1;
while($uvjet){
    echo $t++, '<br>';
    if($t>10){
        $uvjet=false;
    }
}
echo '<hr>';

// niti jednom neće ući u petlju
$j=10;
for($i=4;$i>$j;$i--){
    echo $i++, '<br>';
}
echo '&gt;' . $i; // varijabla i ima vrijednost koju je ostvarila u petlji
echo '<hr>';

// uobičajna while petlja
$i=0;

while($i<10){
    echo ++$i, '<br>';
}
echo '<hr>';
// continue isto kao u for
// break isto kao i for

// Zadatak: 
//Za uneseni cijeli broj ispišite koliko ima znamenaka
$broj=23234;
$znamenaka=0;
while($broj>0){
    $znamenaka++;
    $broj = (int)($broj/10);
    echo $broj, '<br />';
}

echo $znamenaka;
echo '<hr>';


// beskonačna while petlja
while(true){
    break;
}


$datoteka='datoteka.txt';
$najveci=0;
$ukupno=0;
if (file_exists($datoteka)) { // ako datoteka postoji
    $dat = fopen($datoteka, 'r');
    while (($line = fgets($dat)) !==false) {
        //echo strlen($line), '<br>';
        if(strlen($line)===2){ // dva su znaka skrivena: CR i LF
            //echo $line, ',' . $ukupno, '<br>';
            if($ukupno>$najveci){
                $najveci=$ukupno;
            }
            $ukupno=0;
        }else{
            $ukupno+=(int)$line;
        }
       

    }
    fclose($dat);
}
echo $najveci;