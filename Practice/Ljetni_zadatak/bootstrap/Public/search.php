<?php if(!isset($_GET['page'])){
  $_GET['page'] =1;
  }?>
<br>
<h2 class="text-center">SEARCH</h2>
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
    <div class="container">
      <div class="row">
      <?php for ($i=0; $i < count($result); $i++) {?>
      <!--Product-->
      <div class="col-md-4 mt-5">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="images/<?php echo $result[$i]['image']?>" alt="Card image cap">
          <div class="card-section">
          <h4><a href="index.php?item&Product_id=<?php echo $result[$i]['id']?>"><?php echo $result[$i]['title']?></a></h4>
          <p> Author: <?php echo $result[$i]['author']?></p>
          <p><?php echo mb_strimwidth($result[$i]['content'], 0, 25, "...") ?></p>
          <h5>Price: <?php echo $result[$i]['price']?>$</h5>
          </div>
          <a class="btn btn-primary btn-lg btn-block" href="index.php?item&Product_id=<?php echo $result[$i]['id']?>">Buy</a>
        </div>
    </div>
      <!--Product-->
      <?php } ?>
      </div>
    </div>
</div>

</div>
<!-- Best buy-->
