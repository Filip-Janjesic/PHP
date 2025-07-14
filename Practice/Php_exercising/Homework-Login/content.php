<?php 

include "header.php";
IsLogout('index.php');
?>
<!-- Start Top Bar -->
<div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">Marketing Site</li>
          <li><a href="#">One</a></li>
          <li><a href="#">Two</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

<?php




?>
    <div class="row column text-center">
      <h2><?php echo "Welcome ". $_SESSION['email'];?></h2>
      <hr>
    </div>

    <div class="row column text-center">
      <h2>Chat</h2>
      <hr>
      <h3>autor : </h3>
      <h3>Poruka : </h3>
      <hr>
      <hr>
    </div>



    <hr>

    <div class="row column">
      <div class="callout primary">
        <h3>Really big special this week on items.</h3>
      </div>
    </div>


<?php 
include "footer.php";
?>




<?php  

  function test(){
    echo "test";
  }
?>

<script>


(function loop() {
  setTimeout(function () {
    document.write(' <?php test(); ?> ');
    loop()
  }, 1000);
}());


  </script>

