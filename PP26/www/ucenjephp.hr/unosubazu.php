<?php require_once 'baza.php' ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once 'head.php'; ?>   
  </head>
<body>
    <div class="grid-container">
      <?php 
      // čitati https://www.simplilearn.com/tutorials/php-tutorial/include-in-php
      require_once 'izbornik.php'; ?>
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout" id="tijelo">
          <?php 
          
          $sql = 'insert into 
          smjer(naziv,trajanje,certificiran) 
          values ';
          for($i=0; $i<20000;$i++){
            $sql .= '(\'Novi smjer iz PHP ' . $i . '\',130,true),';
          }
          //echo $sql;
          // makni zadnji zarez
          $sql = substr($sql,0,strlen($sql)-1);
          //echo '<hr />';
          //echo $sql;
          $pocetak = microtime(true);
          $izraz=$veza->prepare($sql);

          $izraz->execute();
          $kraj = microtime(true);
          
          echo $kraj - $pocetak;
          ?>
          </div>
        </div>
        <?php include_once 'podnozje.php'; ?>
      </div>
    </div>
   <?php include_once 'skripte.php'; ?>
  </body>
</html>
