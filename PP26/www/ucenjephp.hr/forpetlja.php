<?php

// ovo nije dobra praksa
/*
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
echo 'Osijek', '<br>';
*/

// generički izgled for petlje
// for(od kuda; do kuda; uvećanje/umanjenje)

for($i=0;$i<10;$i=$i+1){
    echo 'Osijek', '<br>';
}

echo '<hr>';

for($i=0;$i<10;$i=$i+1){
    echo 'Osijek ' . ($i+1), '<br>';
}

echo '<hr>';

for($i=0;$i<10;$i=$i+3){
    echo 'Osijek ' . ($i+1), '<br>';
}

echo '<hr>';

for($i=10;$i>0;$i=$i-1){
    echo 'Osijek ' . $i, '<br>';
}

echo '<hr>';

// ispiši sve parne brojeve od 1 do 20
$poc = 1;
$kraj=20;
for($i=$poc;$i<=$kraj;$i=$i+1){
    if($i%2===0){
        echo $i, '<br>';
    }
}

echo '<hr>';

// zbrojiti prvih 100 brojeva
$zbroj=0;
for($i=1;$i<=100;$i++){
    $zbroj += $i;
}
echo $zbroj;

echo '<hr>';


// prim broj: onaj broj koji je cjelobrojno djeljiva s 1 i sam sa sobom

$broj = 68924;
$prim=true;
for($i=2;$i<$broj;$i++){
    echo 'Provjeravam za ' . $i , '<br>';
    if($broj%$i===0){
        $prim=false;
        // nasilno prekidanje petlje
        break;
    }
}
echo $broj . ($prim ? ' JE' : ' NIJE') . ' prim broj'; 


echo '<hr>';

$zauzeto=3;

for($i=0;$i<10;$i++){
    if($i===$zauzeto){
        // nastavlja od početka petlje (preskače ostatak petlje)
        continue;
    }
    echo $i, '<br>';
}


echo '<hr>';

// ugnježđivanje petlji
echo '<table>';
for($i=1;$i<=10;$i++){
    echo '<tr>';
    for($j=1;$j<=10;$j++){
        echo '<td style="text-align: right;">' . $i * $j, '</td>';
    }
    echo '</tr>';
}
echo '</table>';

// prekidanje vanjske petlje
for($i=1;$i<=10;$i++){
    for($j=1;$j<=10;$j++){
       if($j===3){
        break 2; // prekida vanjsku petlju (i unutarnju)
       }
    }
}

// beskonačna petlja
for(;;){
break;
}







// samo za napredne
	//$i; $s=0; for($i=1;$i<=100;$i++) $s+=$i;

	// $i; $s; for($i=1, $s=0;$i<=100; $s+=$i, $i++);
//
	//	 $i=1; $s=0; for( ; $i<=100; $i++){ $s+=$i; }
//
		// $i; $s=0; for($i=1; ; $i++){ if($i<=100) $s+=$i; else break;}
//
	//	 $i; $s=0; for($i=1;$i<=100;){ $s+=$i; $i++;}
//
//		 $i; $s=0; for($i=1; ; ){ if($i<=100) {$s+=$i; $i++;} else break;}
//
//		 $i=1; $s=0; for( ; $i<=100 ; ){ $s+=$i; $i++;}
//
//		  $i=1; $s=0; for( ; ; $i++){if($i<=100)  $s+=$i; else break;}
//
//		 $i=1; $s=0; for( ;  ; ){if($i<=100) {$s+=$i; $i++;} else break;} 
//		
//

