<?php 

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="?product"><?php echo TITLE;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="?product">Products</a>
      </li>
      <li class="nav-item">
      <?php
      if(isset($_SESSION['id'])){
        echo "<a class='nav-link' href='?logout'>Logout</a></li>";
      }else{
        echo "<a class='nav-link' href='?login'>Login</a></li>";
      }
      
      if(isset($_SESSION['role']) && $_SESSION['role']== 'admin'){
        echo "<li class='nav-item'><a class='nav-link' href='?admin'>Admin</a></li>";
      }
      ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href='https://github.com/Ante889/Edunova/tree/master/Ljetni_zadatak/bootstrap'>Code on github</a>
      </li>
    </ul>
    <form action="index.php?search" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <input type="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>
</nav>

