<?php 
  include "Include/Head.php";
?>
<body>

<!--Top bar(Navigation)-->

<?php 
  include "Include/Navigation.php";
?>

<!--End top bar(Navigation)-->

<!--Section 1-->

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="Test.jpg" alt="">
          <figcaption class="orbit-caption">Test1</figcaption>
        </figure>
      </li> 
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="Test2.jpg" alt="Something">
          <figcaption class="orbit-caption">Test2</figcaption>
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

<!--End Section 1-->
<div class="space"></div>

<!-- Section 3-->

<div class="grid-x">
  <div class="cell medium-3 large-3 small-12 category">


    <!-- Aside -->
    
    <?php
      include "Include/Aside.php";
    ?>

    <!-- Section 4 -->
    
      <div class="grid-container">
        <div class="grid-x grid-margin-x small-up-1 medium-up-3">
          <div class="cell">
            <div class="card">
              <img src="Test 3.png">
              <div class="card-section">
              <h4>This is a row of cards.</h4>
                <p>This row of cards is embedded in an X-Y Block Grid.</p>
                <h5>Price: 12.99$ </h5>
              </div>
              <a class="button primary" href="product.php?Product_id='Id'">Buy</a>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
  <!-- End Section 4-->

<!-- Pagination-->
<nav aria-label="Pagination">
  <br><br><br>
  <ul class="pagination">
    <li class="pagination-previous disabled">Previous <span class="show-for-sr">page</span></li>
    <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
    <li><a href="#" aria-label="Page 2">2</a></li>
    <li><a href="#" aria-label="Page 3">3</a></li>
    <li><a href="#" aria-label="Page 4">4</a></li>
    <li class="pagination-next"><a href="#" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
  </ul>
</nav>
<!-- End Pagination -->

  </div>
</div>
<!-- End Section 3-->
<br>

<!-- Section 4 (best buy)-->

<?php

include "Include/BestBuy.php";

?>

<!-- End section 4 (best buy)-->
<hr>


<br>

<?php

include "Include/Footer.php";

?>