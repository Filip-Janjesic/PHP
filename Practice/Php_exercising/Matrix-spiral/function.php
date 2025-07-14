<?php

if(isset($_GET['Lang'])){
    $Lang=$_GET['Lang'];
    include 'Lang/'.$Lang.'.php';
  }else{
    $_GET['Lang']="Hrv";
    include 'Lang/Hrv.php';
  }

function ShowInInput(string $Name){

    if(isset($_POST[$Name])){
        echo $_POST[$Name];
    }

};

function ShowInInputGet(string $Name){

    if(isset($_GET[$Name])){
        echo $_GET[$Name];
    }

};

function ShowInInputChecked(string $Name){

    if(isset($_POST[$Name])){
        echo "Checked";
    }

};