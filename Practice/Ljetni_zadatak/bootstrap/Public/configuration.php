<?php 
ob_start();
session_start();
include "resources/database.php";
include "resources/function.php";
include "resources/productClass.php";

define("TITLE", "MyShop");
define("PATH", "http://polaznik07.edunova.hr/");