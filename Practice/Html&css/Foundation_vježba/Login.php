<?php 
  include "Include/Head.php";
?>
<body>

<!--Top bar(Navigation)-->

<?php 
  include "Include/Navigation.php";
?>

<!--End top bar(Navigation)-->


<form class="log-in-form max-width-700 align-center-middle">
<h4 class="text-center">Login</h4>
<label>Email
<input type="email" name="email" placeholder="Input mail">
</label>
<label>Password
<input type="password" name="password" placeholder="Input password">
</label>
<input class="button expanded" type="submit" name="Submit" value="Login">
<p class="text-center"><a href="#">Forgot your password?</a></p>

</form>

<br>

<?php

include "Include/Footer.php";

?>

