<?php
isLogin('index.php');


if(isset($_POST['submit-login'])){
  include 'resources/userLogin.php';
  $Msg = $login->checkErrors();
}

?>

<br>

<div class="bg-light text-center">
<h5>Admin</h5>
  <h5>Email - admin@gmail.com</h5>
  <h5>Password - admin123</h5>
</div>
  <form action="" method="POST">
  <div class="form-group row">
    <div class="col-sm-5">
    <div class="form-group">
    <h3 class="text-center">Login</h3>
    <br>
    <div class="form-group text-center">
        <input class="form-control" type="text" name="email-login" placeholder="Email">
    </div>
    <?php
        if(isset($Msg['email'])){echo "<h4 style='color:red;'>".$Msg['email']."</h4>";}
    ?>
    <div class="form-group text-center">
        <input class="form-control" type="Password" name="password-login" placeholder="Password">
    </div>
    <?php
        if(isset($Msg['password'])){echo "<h4 style='color:red;'>".$Msg['password']."</h4>";}
    ?>
    <br>
    <input type="submit" name="submit-login" class="btn btn-primary btn-lg btn-block" value="Login">
    <br><br>
    <h4 class="text-center">You do not have an account? </h4><a class="text-center" href="?register"><h4>Create acount</h4></a>
    </div>
    </div>
  </form>
</div>
</div>