<?php

include_once __DIR__. '/vendor/autoload.php';

use src\classes\new;

$newsDom=new News('https://www.washingtonpost.com/');
var_dump($newsDom);