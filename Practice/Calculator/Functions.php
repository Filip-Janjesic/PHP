<?php

if(isset($_POST['submit'])){

   echo 'Result ='. Calculate($_POST['FirstNumber'],$_POST['SecondNumber'],$_POST['Operations']).'<hr>';

}


function Calculate(int $Number1, int $Number2,  string $Operations){

    switch ($Operations) {
        case '+':
            $Result=$Number1 + $Number2;
            break;
        case '-':
            $Result=$Number1 - $Number2;
            break;
        case '*':
            $Result=$Number1 * $Number2;
            break;
        case '/':
            $Result=$Number1 / $Number2;
            break;        
        default:
            $Result= "Error";
            break;
    }
    return $Result;

}

function ShowInInput(string $Name){

    if(isset($_POST[$Name])){
        echo $_POST[$Name];
    }

};