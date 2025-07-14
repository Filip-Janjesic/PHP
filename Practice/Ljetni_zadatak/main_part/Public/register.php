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
        <h3>Create account</h3>
        <br>
        <?php
        if(isset($errors['name'])){echo "<h4 style='color:red;'>".$errors['name']."</h4>";}
        ?>
        <div class="row columns text-center">
            <input type="text" name="Firstname" placeholder="Firstname">
        </div>
        <?php
        if(isset($errors['lastname'])){echo "<h4 style='color:red;'>".$errors['lastname']."</h4>";}
        ?>
        <div class="row columns text-center">
            <input type="text" name="Lastname" placeholder="Lastname">
        </div>
        <?php
        if(isset($errors['email'])){echo "<h4 style='color:red;'>".$errors['email']."</h4>";}
        ?>
        <div class="row columns text-center">
            <input type="text" name="Email" placeholder="Email">
        </div>
        <?php
        if(isset($errors['password'])){echo "<h4 style='color:red;'>".$errors['password']."</h4>";}
        ?>
        <div class="row columns text-center">
            <input type="Password" name="Password" placeholder="Password">
        </div>
        <div class="row columns text-center">
            <input type="Password" name="Confirm-Password" placeholder="Confirm password">
        </div>
        <br>
        <input type="submit" name="submit" class="primary button expanded search-button" value="Register">
        <?php
        if(isset($errors['complete'])){echo "<h4 style='color:green;'>".$errors['complete']."</h4>";}
        ?>
        <h4><a href="?login">Login</a></h4>
    </form>
    </div>
</div>

