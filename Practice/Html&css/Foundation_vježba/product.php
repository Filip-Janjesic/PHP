<?php 
  include "Include/Head.php";
?>
<body>

  <!--Top bar(Navigation)-->
<?php 
  include "Include/Navigation.php";
?>
<!--End top bar(Navigation)-->

<br>

<div class="grid-x">
        <div class="grid-x grid-margin-x">
          <div class="medium-7 cell">
            <img class="thumbnail" src="test.jpg">
            <div class="grid-x grid-padding-x small-up-4">
              <div class="cell">
                <img src="test.jpg">
              </div>
              <div class="cell">
                <img src="test.jpg">
              </div>
              <div class="cell">
                <img src="test.jpg">
              </div>
              <div class="cell">
                <img src="test.jpg">
              </div>
            </div>
          </div>
          
          <div class="medium-5 cell">
            <h2 style="color:pink;">8.00$</h2>
            <hr>
            <p>Author: Netko Netko </p>
            <p>Language: English </p>
            <h3>Naslov proizvoda</h3>
            <p>Opis proizovda: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit accusantium qui, deleniti error eum iure reprehenderit delectus maiores culpa perspiciatis, ipsam recusandae expedita numquam sunt corrupti obcaecati maxime itaque. Nulla.</p>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>
            <br>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span> 
            <p class="custom-p">(Broj ljudi koji su ocjenili)</p>
            <hr>
            <a href="cart.php" class="button large expanded custom-button">Add to cart</a>
            </div>
        </div>

    <div class="">
          <hr>
          <ul class="tabs" data-tabs id="example-tabs">
            <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Reviews</a></li>
            <li class="tabs-title"><a href="#panel2">Similar Products</a></li>
          </ul>
          <div class="tabs-content" data-tabs-content="example-tabs">
            <div class="tabs-panel is-active" id="panel1">
              <h4>Reviews</h4>
              <div class="media-object stack-for-small">
                <div class="media-object-section">
                  <img class="thumbnail" src="https://placehold.it/200x200">
                </div>
                <div class="media-object-section">
                  <h5 class="custom-p" >Mike Stevenson</h5>
                  <p class="custom-p">/Date </p>
                  <hr>
                  <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
                </div>
              </div>
              <br>
              <div class="media-object stack-for-small">
                <div class="media-object-section">
                  <img class="thumbnail" src="https://placehold.it/200x200">
                </div>
                <div class="media-object-section">
                  <h5 class="custom-p" >Mike Stevenson</h5>
                  <p class="custom-p">/Date </p>
                  <hr>
                  <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
                </div>
              </div>
              <br>
              <label>
                My Review
                <textarea placeholder="None"></textarea>
              </label>
              <button class="button">Submit Review</button>
            </div>
            <div class="tabs-panel" id="panel2">
              <div class="grid-x grid-margin-x medium-up-3 large-up-5">
                <div class="cell">
                  <img class="thumbnail" src="https://placehold.it/350x200">
                  <h5>Other Product <small>$22</small></h5>
                  <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
                  <a class="button primary" href="#">See more</a>
                </div>
                <div class="cell">
                  <img class="thumbnail" src="https://placehold.it/350x200">
                  <h5>Other Product <small>$22</small></h5>
                  <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
                  <a class="button primary" href="#">See more</a>
                </div>
                <div class="cell">
                  <img class="thumbnail" src="https://placehold.it/350x200">
                  <h5>Other Product <small>$22</small></h5>
                  <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
                  <a class="button primary" href="#">See more</a>
                </div>
                <div class="cell">
                  <img class="thumbnail" src="https://placehold.it/350x200">
                  <h5>Other Product <small>$22</small></h5>
                  <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
                  <a class="button primary" href="#">See more</a>
                </div>
                <div class="cell">
                  <img class="thumbnail" src="https://placehold.it/350x200">
                  <h5>Other Product <small>$22</small></h5>
                  <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam.</p>
                  <a class="button primary" href="#">See more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Footer-->

<?php

Include "Include/Footer.php";

?>

<script>$(document).foundation();</script>