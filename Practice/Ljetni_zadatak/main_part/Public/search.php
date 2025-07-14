<?php if(!isset($_GET['page'])){
  $_GET['page'] =1;
  }?>
<br>
<h2 class="text-center">PRODUCTS</h2>
<div class="grid-x">

<div class="cell small-12">
<?php
if(!empty($_GET['search'])){
$result = $product -> searchProduct($_GET['search']);
if(count($result)==0){
    echo "<h3 style='color:red;'>no products to display</h3>";
}
}else{
    include "product.php";
}
?>
  <!-- Products -->
<br><br>
    <div class="grid-x grid-margin-x small-up-1 medium-up-3 large-up-3">
      <?php for ($i=0; $i < count($result); $i++) {?>
      <!--Product-->
      <div class="cell small-3">
        <div class="card">
          <img src="images/<?php echo $result[$i]['image']?>">
          <div class="card-section">
          <h4><?php echo $result[$i]['title']?></h4>
            <p> Author: <?php echo $result[$i]['author']?></p>
            <p><?php echo mb_strimwidth($result[$i]['content'], 0, 30, "...") ?></p>
            <h5>Price: <?php echo $result[$i]['price']?>$</h5>
          </div>
          <a class="button primary" href="index.php?item&Product_id=<?php echo $result[$i]['id']?>">Buy</a>
        </div>
      </div>
      <!--Product-->
      <?php } ?>
    </div>
</div>

</div>

<!-- Best buy-->      

<br>
<div class="text-center">
  <h2>Best buy products</h2>
  <hr>
</div>
<div class="grid-container">
  <div class="grid-x grid-margin-x small-up-1 medium-up-6">
    <div class="cell">
      <div class="card">
        <img src="images/unnamed.png">
        <div class="card-section">
        <h5>This is a row of cards.</h5>
          <p>This row of cards is embedded in an X-Y Block Grid.</p>
        </div>
        <a class="button primary" href="#">See more</a>
      </div>
    </div>  
    </div>
  </div>
</div>
</div>


<!-- Best buy-->
