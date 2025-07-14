<?php
include 'functions.php';

if(isset($_POST['submit-login'])){
    loginError(Escape_string($_POST['Email']),Escape_string($_POST['Password']));
  }else{
      header('Location: index.php');
  }     


?>