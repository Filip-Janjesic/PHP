<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love test</title>
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
<body>

<div class="flex-container">

        <form action="" method="POST">        
          <h2>Love Test</h2>
          <label for="FirstName"></label>
          <input class="custom-form" type="text" name="FirstName" id="FirstName" placeholder="Enter name">
          <br>
          <label for="SecondName"></label>
          <input class="custom-form" type="text" name="SecondName" id="SecondName" placeholder="Enter name">
          <br>
          <input type="submit" name="submit" value="Calculate">
        </form>

    </div>
    <div class="flex-item-right">
      <?php 
      include 'functions.php';
      ?>
</div>
</div>
</body>
</html>
