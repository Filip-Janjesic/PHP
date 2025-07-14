<?php include "header.php";?>
<body>

<!-- Start Top Bar -->

<?php include "navigation.php";?>

<!-- End Top Bar -->

<?php

if(isset($_GET["product"])){
  include "product.php";
}elseif(isset($_GET["login"])){
  include "login.php";
}elseif(isset($_GET["register"])){
  include "register.php";
}elseif(isset($_GET["logout"])){
  include "resources/userLogin.php";
  $login->logoutUser();
}elseif(isset($_GET["item"])){
  include "product_page.php";
}elseif(isset($_GET["search"])){
  include "search.php";
}elseif(isset($_GET["admin"]) && !empty($_SESSION['role']) &&$_SESSION['role']=='admin'){
  include "Admin/show_product.php";
}elseif(isset($_GET["productAdd"])&& !empty($_SESSION['role']) && $_SESSION['role']=='admin'){
  include "Admin/create_product.php";
}elseif(isset($_GET["productChange"])&& !empty($_SESSION['role']) && $_SESSION['role']=='admin'){
  include "Admin/update_product.php";
}else{
  include "product.php";
}

?>


<?php include "footer.php";?>
<?php include "js.php";?>

</body>
</html>



