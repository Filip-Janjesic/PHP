<?php


if(isset($_POST['submit'])){

    $Names = strtolower($_POST['FirstName'] . $_POST['SecondName']);
    $Names = str_replace(' ','',$Names);
    $LettersNumber= strlen($Names);
    for ($i=0; $i < $LettersNumber; $i++) { 
        $Letter = substr($Names, $i,1);
        $Values[]=substr_count($Names,$Letter);
    }
    echo $Value=implode('',$Values);
    echo '<hr>';
    echo Calculate($Value);

}

function Calculate($Value)
{ 
    $sum = ceil(strlen($Value)/2);
    if($sum>=2){
        $sum--;
        for ($i=0; $i <=$sum ; $i++) { 
            if($i != $sum){
            $Values[$i]=substr($Value, $i,1) + substr($Value, -$i-1,1);
            }
            else{
                if(strlen($Value) & 1){
                    $Values[$i]=substr($Value, $i,1);
                }else{
                    $Values[$i]=substr($Value, $i,1) + substr($Value, -$i-1,1);
                } 
            }
        }
        echo implode('',$Values).'<hr>';
        return Calculate(implode('',$Values));
    }
        return '<h1>Result is '.$Value.'</h1>';
}


