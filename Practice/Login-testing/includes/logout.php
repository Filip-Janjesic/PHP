<?php 
session_start();
include 'login.php';

$Login-> Logout();
Header('Location: ../index.php');


?>