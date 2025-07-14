<?php
isLogin('index.php');


if(isset($_POST['submit-login'])){
  include 'resources/userLogin.php';
  $Msg = $login->checkErrors();
}

?>

<br>
<div class="login">
<div class="responsive-blog-footer">
  <h5>Admin</h5>
  <h5>Email - admin@gmail.com</h5>
  <h5>Password - admin123</h5>
</div>
<div class="translucent-form-overlay text-center centered">
  <form action="" method="POST">
    <h3>Login</h3>
    <br>
    <div class="row columns text-center">
        <input type="text" name="email-login" placeholder="Email">
    </div>
    <?php
        if(isset($Msg['email'])){echo "<h4 style='color:red;'>".$Msg['email']."</h4>";}
    ?>
    <div class="row columns text-center">
        <input type="Password" name="password-login" placeholder="Password">
    </div>
    <?php
        if(isset($Msg['password'])){echo "<h4 style='color:red;'>".$Msg['password']."</h4>";}
    ?>
    <br>
    <input type="submit" name="submit-login" class="primary button expanded search-button" value="Login">
    <h4>You do not have an account? </h4><a href="?register"><h4>Create acount</h4></a>
 </form>
</div>
</div>