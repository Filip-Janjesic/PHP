<?php if(!isset($_GET['page'])){
  $_GET['page'] =1;
  }?>
<!-- Start orbit  -->
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="images/Test.jpg" alt="Space">
          <a href=""> 
          <figcaption class="orbit-caption">Ad content.</figcaption>
          </a>
        </figure>
      </li>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0">
      <span class="show-for-sr">First slide details.</span>
      <span class="show-for-sr" data-slide-active-label>Current Slide</span>
    </button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
  </nav>
</div>

<!-- End orbit -->


<hr><br>
<h2 class="text-center">PRODUCTS</h2>
<div class="grid-x">

    <div class="cell small-12 large-3">

      <!-- Aside -->

      <div class="product-filters">
  <ul class="mobile-product-filters vertical menu show-for-small-only" data-accordion-menu>
   <li>
     <a href="#"><h2>Filter</h2></a>   
     <ul class="vertical menu" data-accordion-menu>
      <li class="product-filters-tab">
        <a href="#">Category</a>
        <ul class="categories-menu menu vertical nested is-active">
           <a href="#" class="clear-all" id="category-clear-all">Clear All</a> 
           <li><input class="category-clear-selection" id="category-checkbox1" type="checkbox"><label for="category-checkbox1">Category 1</label></li>
         </ul>
     </li>
     <li class="product-filters-tab">
        <a href="#">Size</a>
        <ul class="categories-menu menu vertical nested is-active">
          <a href="#" class="clear-all" id="size-clear-all">Clear All</a>  
          <li><input id="size-checkbox1" type="checkbox"><label for="size-checkbox1">Small</label></li>
        </ul>

      </li>
     <li class="product-filters-tab">
        <a href="#">Color</a>
        <ul class="categories-menu menu vertical nested">
          <a href="#" class="clear-all" id="color-clear-all">Clear All</a>  
          <li><input id="color-checkbox1" type="checkbox"><label for="color-checkbox1">All Color</label></li>
        </ul>
      </li>
     <li class="product-filters-tab"> 
        <a href="#">Price</a>
        <ul class="categories-menu menu vertical nested">
          <a href="#" class="clear-all" id="price-clear-all">Clear All</a> 
          <li><input id="price-checkbox1" type="checkbox"><label for="price-checkbox1">Under $25</label></li>
        </ul>
      </li>
     </ul>
   </li>
 </ul>
 
 <h1 class="product-filters-header hide-for-small-only">Filter</h1>
 <ul class="vertical menu hide-for-small-only" data-accordion-menu>
    <li class="product-filters-tab">
      <a href="#">Category</a>
      <ul class="categories-menu menu vertical nested is-active">
         <a href="#" class="clear-all" id="category-clear-all">Clear All</a> 
         <li><input id="category-checkbox1" type="checkbox"><label for="category-checkbox1">Category 1</label></li>
      </ul>
   </li>
   <li class="product-filters-tab">
      <a href="#">Size</a>
      <ul class="categories-menu menu vertical nested is-active">
        <a href="#" class="clear-all" id="size-clear-all">Clear All</a>  
        <li><input id="size-checkbox1" type="checkbox"><label for="size-checkbox1">Small</label></li>
      </ul>
   </li>
   <li class="product-filters-tab">
      <a href="#">Color</a>
      <ul class="categories-menu menu vertical nested">
        <a href="#" class="" id="color-clear-all">Clear All</a>  
        <li><input id="color-checkbox1" type="checkbox"><label for="color-checkbox1">All Color</label></li>
      </ul>
   </li>
   <li class="product-filters-tab"> 
      <a href="#">Price</a>
      <ul class="categories-menu menu vertical nested">
        <a href="#" id="price-clear-all">Clear All</a> 
      </ul>
    </li>
  </ul>  
</div>

      <!-- End aside -->


      </div>

<div class="cell small-9">
<?php

$result = $product -> showProductsWihtOffset(6);

?>
  <!-- Products -->
<br><br>
<div class="grid-container">
    <div class="grid-x grid-margin-x small-up-1 medium-up-3 large-up-3">
      <?php for ($i=0; $i < count($result); $i++) {?>
      <!--Product-->
      <div class="cell small-3">
        <div class="card">
          <img src="images/<?php echo $result[$i]['image']?>">
          <div class="card-section"><a href=""></a>
          <h4><a href="index.php?item&Product_id=<?php echo $result[$i]['id']?>"><?php echo $result[$i]['title']?></a></h4>
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
   <!-- Pagination-->
<br><br><br>
<nav aria-label="pagination-centered">
<ul class="pagination">

<?php
if(isset($_GET['page']) && $_GET['page'] > 1){
  $page=$_GET['page']-1;
    echo "<li class=''><a href='index.php?product&page=$page' aria-label='Previous page'>Previous <span class=''>page</span></a></li>";
  }
for ($i=1; $i <= $product->pager(6,0); $i++ ) { 
  if(isset($_GET['page']) && $i == $_GET['page']){
    echo "<li class='current'><span class='show-for-sr'>You're on page</span> $i</li>";
  }else{
    echo "<li><a href='index.php?product&page=$i' aria-label='Page 2'>$i</a></li>";
  }
}
if(empty($_GET['page']) || $product->pager(6,0) > $_GET['page']){
if(!empty($_GET['page'])){
$page=$_GET['page']+1;
echo "<li class=''><a href='index.php?product&page=$page' aria-label='Next page'>Next <span class=''>page</span></a></li>";
}else{
  echo "<li class=''><a href='index.php?product&page=2' aria-label='Next page'>Next <span class=''>page</span></a></li>";
}
}
?>

</ul>
</nav>
<!-- End Pagination -->
</div>


<!--End Products -->



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
