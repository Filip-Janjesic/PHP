<?php 

include "header.php";
IsLogin('content.php');
?>

<div class="translucent-form-overlay text-center centered">
  <form action="loginCheck.php" method="POST">
    <h3>Login</h3>
    <hr>
    <br>
    <div class="row columns text-center">
        <input type="text" name="Email" placeholder="Email">
    </div>
    <div class="row columns text-center">
        <input type="Password" name="Password" placeholder="Password">
    </div>
    <h5><?php if(isset($_SESSION['error'])){echo $_SESSION['error']; unset($_SESSION['error']);}?> </h5>
    <br>
    <input type="submit" name="submit-login" class="primary button expanded search-button" value="Login">
    <a href="register.php">Create acount</a>
 </form>
</div>





<?php 
include "footer.php";
?>




