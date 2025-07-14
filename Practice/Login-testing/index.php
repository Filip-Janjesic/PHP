<?php 
session_start();
include 'includes/database.php';
include 'includes/register.php';
include 'includes/login.php';
echo" <br>";
if($Login-> is_login == true){
echo 'Ulogiran user -' . $_SESSION['User_id'] .'<br>';
echo 'Role usera -' .$_SESSION['Role'].'<br>';
echo "<a class='alert button' href='includes/logout.php'>Logout</a>";
}

if(isset($_POST['submit'])){
  $Errors =  $Register -> register_user($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);
}

?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login test</title>
    <link rel="stylesheet" href="assets/css/foundation.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.1/dist/js/foundation.min.js" integrity="sha256-WUKHnLrIrx8dew//IpSEmPN/NT3DGAEmIePQYIEJLLs= sha384-53StQWuVbn6figscdDC3xV00aYCPEz3srBdV/QGSXw3f19og3Tq2wTRe0vJqRTEO sha512-X9O+2f1ty1rzBJOC8AXBnuNUdyJg0m8xMKmbt9I3Vu/UOWmSg5zG+dtnje4wAZrKtkopz/PEDClHZ1LXx5IeOw==" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
  </head>
<body>

<div class="grid-x">
  <div class="cell small-6">

  
  <form method= "POST">
    <div class="sign-in-form">
      <h4 class="text-center">Register</h4>
      <label for="sign-in-form-username">Username</label>
      <input type="text" name="username" class="sign-in-form-username" id="sign-in-form-username">
      <label for="sign-in-form-username">Email</label>
      <input type="email" name="email" class="sign-in-form-username" id="sign-in-form-username">
      <label for="sign-in-form-password">Password</label>
      <input type="password" name="password" class="sign-in-form-password" id="sign-in-form-password">
      <label for="sign-in-form-password">Confirm password</label>
      <input type="password" name="confirm_password" class="sign-in-form-password" id="sign-in-form-password">

      <button type="submit" name="submit" class="sign-in-form-button">Register</button>
      <h4 style="color: red"><?php 
      if(isset($Errors['Password']) || isset($Errors['Email']) || isset($Errors['Empty'])){
      echo $Errors['Password'], $Errors['Email'],$Errors['Empty']; 
      }
      ?></h4>
    </div>
  </form>

  </div>
  <div class="cell small-6">
    
  <form method= "POST">
    <div class="sign-in-form">
      <h4 class="text-center">Sign In</h4>
      <label for="sign-in-form-username">Email</label>
      <input type="email" name="Login-Email" class="sign-in-form-username" id="sign-in-form-username">
      <label for="sign-in-form-password">Password</label>
      <input type="password" name="Login-Password" class="sign-in-form-password" id="sign-in-form-password">
      <button type="submit" name="Login-Submit" class="sign-in-form-button">Sign In</button>
    </div>
    <br>
    <div class="sign-in-form">
      <h4 class="text-center">Forget password</h4>
      <label for="sign-in-form-username">Email</label>
      <input type="email" name="Login-Email" class="sign-in-form-username" id="sign-in-form-username">
      <button type="submit" name="Login-Submit" class="sign-in-form-button">Sign In</button>
    </div>
  </form>

  </div>
</div>

<?php

if(isset($_POST['Login-Submit'])){
  if($Login -> Login($_POST['Login-Email'], $_POST['Login-Password'])){
    Header('Location: index.php');
  }
}
?>


<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
<script src="assets/js/custom.js"></script>
</body>


</html>


