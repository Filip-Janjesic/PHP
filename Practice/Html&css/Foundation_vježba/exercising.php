<?php

if(isset($_GET['color'])){
    $Color =$_GET['color'];
}

?>


<?php 
  include "Include/Head.php";
?>
<body>

<!--Top bar(Navigation)-->

<?php 
  include "Include/Navigation.php";
?>

<!--End top bar(Navigation)-->


<h1 style="color:<?php echo $Color;?>">TEXT</h1>

<a href="exercising.php?color=blue">BLUE</a>
<a href="exercising.php?color=red">RED</a>
<a href="exercising.php?color=green">GREEN</a>
<a href="exercising.php?color=white">WHITE</a>
<hr><hr><hr>


        <form action="" method="post">
        <label for="">Name</label>
            <input type="text" name="Name" placeholder="input name">
        <label for="">Lastname</label>    
            <input type="text" name="Lastname" placeholder="input lastname">
        <label for="">Email</label>    
            <input type="email" name="Email" placeholder="input email">    
        <label for="">Password</label>    
            <input type="password" name="Password" placeholder="input password">
        <label for="">Confirm password</label>    
            <input type="password" name="Confirm" placeholder="confirm password">    
            <input type="submit" name="submit" class="button">

        </form>


<?php 

if(isset($_POST['submit'])){

    $Name=$_POST['Name'];
    $Lastname=$_POST['Lastname'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $Confirm_Password=$_POST['Confirm'];
    echo $Name . '<br>',
         $Lastname . '<br>',
         $Email . '<br>',
         $Password . '<br>',
         $Confirm_Password . '<br>';

}

?>


<hr>


<br>

<?php

include "Include/Footer.php";

?>

