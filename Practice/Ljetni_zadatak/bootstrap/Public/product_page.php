<?php

$item=$product-> showProductsId($_GET['Product_id']);

?>

<div class="container">
  <div class="row">
      <div class="col-md-6 col-sm-12">
        <img class="img-thumbnail" src="images/<?php echo $item[0]['image'];?>">
      </div>
      <div class="col-md-6 ">
        <h3><?php echo $item[0]['title'];?></h3>
        <p><?php echo $item[0]['content'];?></p>
        <h4>Price</h4>
        <p><?php echo $item[0]['price'];?>$</p>
        <a href="#" class="btn btn-primary btn-lg btn-block"><?php if(isset($_SESSION['id'])){echo "Buy now";}else{echo "Login to buy this product";}?></a>
    </div>
  </div><br><br>
    


  <div class="container bootstrap snippets bootdey">
    <div class="row">
		<div class="col-md-12">
		    <div class="blog-comment">
				<h3 class="">Comments</h3>
                <hr/>
				<ul class="comments">
				<li class="clearfix">
				  <img src="images/unnamed.png"  class="avatar" alt="">
				  <div class="post-comments">
				      <p class="meta">Dec 2, 2021 <a href="#">Someone</a> says : <i class="pull-right"><a href="#"></a></i></p>
				      <p>
				          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				          Etiam a sapien odio, sit amet
				      </p>
				  </div>
				</li>
				<li class="clearfix">
				  <img src="images/unnamed.png" class="avatar" alt="">
				  <div class="post-comments">
				      <p class="meta">Dec 2, 2021 <a href="#">Someone</a> says : <i class="pull-right"><a href="#"></a></i></p>
				      <p>
				          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				          Etiam a sapien odio, sit amet
				      </p>
				  </div>
				</li>
        <li class="clearfix">
				  <img src="images/unnamed.png" class="avatar" alt="">
				  <div class="post-comments">
				      <form action="">
              <div class="form-group">
                <input type="text" class="form-control" name="" id="">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
              </form>
				  </div>
				</li>

				</ul>
			</div>
		</div>
	</div>
</div>