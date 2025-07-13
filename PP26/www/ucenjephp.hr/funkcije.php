<?php
// postojeće funckije
/*
phpinfo(); // ne prima parametre, ne vraća vrijednost

echo '<hr>';

print_r($_GET); // prima parametre, ne vraća vrijednost

echo '<hr>';

$t = time(); // ne prima parametre, vraća vrijednost
echo $t, '<hr>';

if(!isset($_GET['ime'])){ // prima parametre, vraća vrijednost
    echo 'Ime nije postavljeno', '<hr>';
}

*/

// Ovo je stari način rada s funkcijama,
// kada su funkcije deklarirane u php datoteci
// koja se učita i koriste se funkcije na način
// da se samo pozovu imenom


// ne prima parametre, ne vraća vrijednost
function pozdraviSvijet(){
    echo '<hr>Hello world';
    echo '<br>';
    echo 'Pozdrav svijetu';
    echo '<hr>';
}

pozdraviSvijet();
echo '22';
pozdraviSvijet();


// prima parametre, ne vraća vrijednost
function l($v){
    echo '<pre>';
    print_r($v);
    echo '</pre>';
    echo '<hr>';
}

$niz=[2,2,2,3];
l($niz);
l('Pero');
l([7,3,3]);

//ne prima parametre, vraća vrijednost
function slucajniBroj(){
    $prvi = rand(1,10);
    $drugi = rand(-10,-1);
    return abs($prvi+$drugi);
}

$s =0;

for($i=0;$i<100;$i++){
    $s+= slucajniBroj();
}
l($s);


// prima parametre, vraća vrijednost
function primBroj($broj,$z=0){ // $z=0 znači da ako poziv funckije ne sadrži vrijednost za varijablu $z ona dobiva vrijednost 0
    for($i=2;$i<$broj;$i++){
        if($broj % $i===0){
            return false; // prekida izvođenje funkcije
        }
    }
    return true;
}

// ispiši zbroj prvih 13 prim brojeva

$trenutni=1;
$suma=0;
$ukupno=0;
while(true){
    if(primBroj(++$trenutni)){
        $suma+=$trenutni;
        $ukupno++;
    }
    if($ukupno===13){
        break;
    }
}
echo $ukupno, '=>', $suma;



// funkcije i varijable

$i=2;

function funkcija($broj){
    // Warning: Undefined variable $i
    //return $i + $broj;
    return $broj;
}

l(funkcija($i + 5));