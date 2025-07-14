<?php

/////Zadatak 1. Write a PHP program to compute the sum of the two
//given integer values. If the two values are the same, then returns triple their sum.

function Zadatak1(int $num1,int $num2)
{

    return $num1===$num2 ? ($num1+$num1)*3: $num1+$num2;

}
echo Zadatak1(1,2);
echo '<br>';
echo Zadatak1(3,2);
echo '<br>';
echo Zadatak1(2,2);

echo '<br>';
echo '<br>';

// Zadatak 2.
//2. Write a PHP program to get the absolute difference between n and 51.
//If n is greater than 51 return triple the absolute difference

function Zadatak2(int $n)
{

    return $n <= 51 ? 51 - $n : ($n - 51)*3; 

}

echo Zadatak2(53);
echo '<br>';
echo Zadatak2(30);
echo '<br>';
echo Zadatak2(51);


//Zadatak 3 - 3. Write a PHP program to check two given integers, 
//and return true if one of them is 30 or if their sum is 30.

function Zadatak3(int $num1, int $num2)
{

    if($num1 == 30 || $num2 == 30){
        return true;
    }else if($num1 + $num2 == 30){
        return true;
    }else{
        return false;
    }

}
echo '<hr>';
echo Zadatak3(30, 0);
echo '<br>';
echo Zadatak3(25, 5);
echo '<br>';
echo Zadatak3(20, 30);
echo '<br>';
echo Zadatak3(30, 25);




//Zadatak 4 10. Write a PHP program to check if a given positive number is a multiple of 3 or a multiple of 7.


function Zadatak10(int $num1): bool 
{
    if($num1 >=0){
        if($num1 % 3 == 0 || $num1 % 7 == 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

//Zadatak 24 - Write a PHP program to convert the last 3 characters of a given string in upper case. 
//If the length of the string has less than 3 then uppercase all the characters.

function Zadatak24 (string $s) : string
{

    if(strlen($s) <=3){
        return strtoupper($s);
    }else{
        return substr($s,0,strlen($s)-3) . strtoupper(substr($s, -3));
    }

}
echo '<hr>';
echo Zadatak24('Python'). "\n";
echo Zadatak24('Javascript'). "\n";
echo Zadatak24('js'). "\n";
echo Zadatak24('PHP'). "\n";

echo '<hr>';
echo Zadatak10(3);
echo '<br>';
echo Zadatak10(14);
echo '<br>';
echo Zadatak10(12);
echo '<br>';
echo Zadatak10(37);




echo '<hr>';

//Prosti brojevi

$Broj=11;

function ProstiBroj(int $num1) :bool
{

    for ($i=2; $i < $num1; $i++) { 
        if($num1 % $i == 0){
            return false;
        }
    }
    return true;
}
if(ProstiBroj($Broj)){
    echo "Prime number";
    
}else{
    echo "not prime";
}

function ShowAllPrimaryNumbers(int $num1,int $num2)
{
    for ($i=$num1; $i < $num2; $i++) { 
        if(ProstiBroj($i)){
            echo $i;
            echo '<hr>';
        }
    }
}

ShowAllPrimaryNumbers(3,100);


//////////FUNKCIJE//////////////  https://www.exakat.io/en/top-100-php-functions/

$Array= array(3,2,1,23,684,9498,1961,898,8948896,[1,2,3],'test',1.10);
class ClassName{}


// 1. COUNT
echo '<hr>';
echo count($Array);
echo count($Array, COUNT_RECURSIVE);


// 2. is_array
echo '<hr>';
$String="String";
echo is_array($Array)? 'yes':'no';
echo '<br>';
echo is_array($String)? 'yes':'no';


// 3. substr
echo '<hr>';
$Test= "OvoJeTest";
echo substr($Test, 3,2);



// 4. in_array 
echo '<hr>';
if(in_array(1.10,$Array, true)){
    echo true;
}


//5. explode
echo '<hr>';
$a='Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley';
print_r(explode(' ',$a));

print_r(explode(' ',$a,4));


//6. str_replace
echo '<hr>';

$Sentence= "Lorem Ipsum is simply dummy";
echo str_replace("Lorem","Lorem123", $Sentence);

//7. implode
echo '<hr>';
echo implode(" ",$Array);


//8 strlen

echo '<hr>';
$Varijabla="btaehehet";
echo strlen($Varijabla);


//9 array_merge

$SecondArray= array('a',0,'aa');
$result= array_merge($Array,$SecondArray);
print_r($result);


//10 strpos
echo '<hr>';
$string= "Pozicija Slova a";

echo strpos($string,'a');


//11 preg_match
echo '<hr>';
$Sentence= 'Some Sentence.';
echo preg_match('/Some/',$Sentence);


//12 sprintf

//////////

//13 trim
echo '<hr>';
$String= '  grahe  ';
echo strlen($String);
$String = trim($String);
echo '<br>';
echo strlen($String);


//14 strtolower
echo '<hr>';
$Varijabla = "SOMETHING";
echo strtolower($Varijabla);


//15 file_exists
echo '<hr>';
$filename = 'FunkcijeVjezba.php';
if(file_exists($filename)){
    echo "Postoji";
}else{
    echo "Ne postoji";
}


//16 is_string
echo '<hr>';
$Varijabla= 1;
if(is_string($Varijabla)){
    echo "true";
}else{
    echo "false";
}


//17 preg_replace
echo '<hr>';
$Sentence = "welcome to the jungle";
$Replace = "club";
echo preg_replace('/jungle/',$Replace,$Sentence);


//18 file_get_contents
echo '<hr>';
$Path='Path od nekog recimo txt';
echo file_get_contents($Path);


//19 array_key_exists
echo '<hr>';
echo array_key_exists(1,$Array);

//20 array_keys
echo '<hr>';
print_r(array_keys($Array,'test'));

//21 dirname
echo '<hr>';
echo dirname('C:\Users\Ante\Documents\GitHub\Edunova\Php_exercising');


//22 function_exists
echo '<hr>';
//Postoji li funkcija...

//23 array_map
echo '<hr>';

$Funkcija = function($value){
    return $value * 10;
};

print_r(array_map($Funkcija,[1,2,3,4,5]));

//24 get_class
echo '<hr>';
$Class= new ClassName;
echo get_class($Class);

//25 class_exists
echo '<hr>';
if(class_exists('ClassName')){
    $Class= new ClassName;
}
//26 is_object
echo '<hr>';
if(is_object($Class)){
    echo 'Object';
}
//27 time
echo '<hr>';
echo time();

//28 json_encode
echo '<hr>';
//json

//29 date 
echo '<hr>';

echo date('y-m-d');

//30 is_null
echo '<hr>';
$NullVariable= null;
if(is_null($NullVariable)){
    echo 'true';
}


//31 is_numeric
echo '<hr>';

foreach($Array as $key){
    if(is_numeric($key)){
        echo "Numeric";
    }else{
        echo 'not numeric';
    }
}


//32 array_shift 
echo '<hr>';
array_shift($Array);
print_r($Array);
//treba izbaciti 3 iz niza 


//33 defined
echo '<hr>';


$variabla="String";
define($variabla,'IME');

echo defined($variabla);


//34 is_dir
echo '<hr>';
$filename = 'C:\Users\Ante\Documents\GitHub\Edunova\Php_exercising';
if(is_dir($filename)){
    echo true;
};

//35 json_decode
echo '<hr>';
//JSON

//36 header
echo '<hr>';
//header('WWW-Authenticate: Negotiate');
//header('WWW-Authenticate: NTLM', false);

//37 strtoupper
echo '<hr>';
//String velika slova

//38 array_values
echo '<hr>';
//Prikaži vrijednosti asociativnog array-a 

//39 md5
echo '<hr>';
//Provjerava string sa hash code-om

//40 method_exists
echo '<hr>';
//postoji li metoda u klasi
class ClassNamee {
    function SomeFunction(){}
}
$New = new ClassNamee;
echo method_exists($New,'SomeFunction');

//41 file_put_contents

$File = 'NekiFile.txt';
$OpenFile = file_get_contents($File);
$OpenFile .= "some content";
file_put_contents($File,$OpenFile);

//42 rtrim
echo '<hr>';
$hello  = "Hello World";
$trimmed = rtrim($hello, "Hdle");
var_dump($trimmed);

//43 array_pop
echo '<hr>';
array_pop($Array);
print_r($Array);
//Treba izbaciti 1.10 sa kraja

//44 unlink
echo '<hr>';
//Sa 41// sam krirao file "Nekifile.txt" i sa unlink ga brišem.  
unlink('NekiFile.txt');


//45 basename
echo '<hr>';
echo basename('C:\Users\Ante\Documents\GitHub\Edunova\Php_exercising');
//izbaci Php_exercising;

//46 realpath
echo '<hr>';
echo realpath('/windows/system32');
echo '<br>';
echo realpath('C:\Program Files\\');

//47 call_user_func
echo '<hr>';

function Funkcija($a){
    return ++$a;
}
echo call_user_func('Funkcija',1);


//48 call_user_func_array
echo '<hr>';
// isto kao i sa call_user_func samo sa array-om

//49 fopen
echo '<hr>';

//$something = fopen("Neki path", 'Mod u kojem radi');

//50 microtime
echo '<hr>';

$time_start = microtime(true);

//Sleep for a while
usleep(100);

$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Did nothing in $time seconds\n";

//51 fclose

$handle = fopen('somefile.txt', 'r');

//52 is_int 

//True ili false je li int 

//53 is_file

// Ako je file

//54 Array_slice 

echo '<hr>';
$SomeArray= array(1 => 1 , 2 => 2,3 => 3,4 => 4);
print_r($SomeArray);
print_r (Array_slice($SomeArray,1,3));

//55 preg_match_all
echo '<hr>';

//

//56 ucfirst

echo '<hr>';
$Sentence = "some words";
ucfirst($Sentence);
//Prvoslove je veliko


//57 intval 

//intval — Get the integer value of a variable

//58 str_repeat

echo '<hr>';
$Repeat = 'Ante ';
echo str_repeat($Repeat, 10);
//Ispiše ante 10 puta;

//59 serialize

//Generates a storable representation of a value.

//This is useful for storing or passing PHP values around without losing their type and structure.

//To make the serialized string into a PHP value again, use unserialize().

// ovo se koristi uglavnom prije slanja podataka u databazu

//60 array_filter

echo '<hr>';
function nešto($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd :\n";
print_r(array_filter($array1, "nešto"));
echo "Even:\n";
print_r(array_filter($array2, "even"));





echo '<hr>';
$Test = new stdClass();
$Test -> name = 'TestName';
$Test -> number = 1;

class ClassName1 
{
    public $TestClass;

    function __construct($Test){
        $this -> TestClass = $Test;
    }

    function ShowTest(){
        echo $this -> TestClass -> name;
    }
}

$Ob = new ClassName1($Test);

$Ob -> ShowTest();
