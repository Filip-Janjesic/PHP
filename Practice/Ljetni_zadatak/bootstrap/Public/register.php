<?php

if(isset($_POST['submit'])){
    include 'resources/userRegister.php';
    $errors=$RegisterClass->CheckErrors();
}

?>
<br>
<div class="login">
    <div class="translucent-form-overlay text-center centered">
    <form action="" method="POST">
    <div class="form-group row">
    <div class="col-sm-5">
    <div class="form-group">
        <h3>Create account</h3>
        <br>
        <?php
        if(isset($errors['name'])){echo "<h4 style='color:red;'>".$errors['name']."</h4>";}
        ?>
        <div class="form-group text-center">
            <input class="form-control"  type="text" name="Firstname" placeholder="Firstname">
        </div>
        <?php
        if(isset($errors['lastname'])){echo "<h4 style='color:red;'>".$errors['lastname']."</h4>";}
        ?>
        <div class="form-group text-center">
            <input class="form-control"  type="text" name="Lastname" placeholder="Lastname">
        </div>
        <?php
        if(isset($errors['email'])){echo "<h4 style='color:red;'>".$errors['email']."</h4>";}
        ?>
        <div class="form-group text-center">
            <input class="form-control"  type="text" name="Email" placeholder="Email">
        </div>
        <?php
        if(isset($errors['password'])){echo "<h4 style='color:red;'>".$errors['password']."</h4>";}
        ?>
        <div class="form-group text-center">
            <input class="form-control"  type="Password" name="Password" placeholder="Password">
        </div>
        <div class="form-group text-center">
            <input class="form-control"  type="Password" name="Confirm-Password" placeholder="Confirm password">
        </div>
        <br>
        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Register">
        <?php
        if(isset($errors['complete'])){echo "<h4 style='color:green;'>".$errors['complete']."</h4>";}
        ?><br>
        <h4><a href="?login">Login</a></h4>
        </div>
    </div>
    </form>
    </div>
</div>

