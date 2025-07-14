<?php include "header.php"; ?>

<?php
IsLogin('content.php');
if(isset($_POST['submit-register'])){
  $Msg=RegistrationErrors($_POST['Register-Email'],$_POST['Register-Password'],$_POST['Register-Confirm-Password']);
}     
?>


<div class="translucent-form-overlay text-center centered">
  <form action="" method="POST">
    <h3>Create account</h3>
    <hr>
    <br>
    <div class="row columns text-center">
        <input type="text" name="Register-Email" placeholder="Email">
    </div>
    <div class="row columns text-center">
        <input type="Password" name="Register-Password" placeholder="Password">
    </div>
    <div class="row columns text-center">
        <input type="Password" name="Register-Confirm-Password" placeholder="Confirm password">
    </div>
    <h5><?php if(isset($Msg)){echo $Msg;}?> </h5>
    <br>
    <input type="submit" name="submit-register" class="primary button expanded search-button" value="Register">

    <a href="index.php">Login</a>
 </form>
</div>

<?php 
include "footer.php";
?>



