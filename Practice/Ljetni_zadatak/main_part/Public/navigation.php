<?php 

?>

<div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
  <div class="title-bar-title">Menu</div>
</div>

<div class="top-bar" id="responsive-menu">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text"><?php echo TITLE;?></li>
      <li><a href="?product">Products</a></li>
      
      <?php
      if(isset($_SESSION['id'])){
        echo "<li><a href='?logout'>Logout</a></li>";
      }else{
        echo "<li><a href='?login'>Login</a></li>";
      }
      if(isset($_SESSION['role']) && $_SESSION['role']== 'admin'){
        echo "<li><a href='?admin'>Admin</a></li>";
      }
      ?>
      <li><a target="_blank" href='https://github.com/Ante889/Edunova/tree/master/Ljetni_zadatak/main_part'>Code on github</a></li>
      

    </ul>
  </div>
  <form action="index.php?search" method="get">
  <div class="top-bar-right">
    <ul class="menu">
      <li><input type="search" name="search" placeholder="Search"></li>
      <li><input type="submit" class="button" value="Submit"></li>
    </ul>
  </div>
  </form>
</div>


