<?php

$product-> createProduct();

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <div class="col-sm-5">
      <div class="form-group text-center">
        <label><h4 class="text-center">TITLE</h4>
          <input class="form-control" type="text" name="title" placeholder="input title">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4 class="text-center">AUTHOR</h4>
          <input class="form-control" type="text" name="author" placeholder="Input author name">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4 class="text-center">IMAGE</h4>
            <input class="form-control" type="file" name="image">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4 class="text-center">PRICE</h4>
          <input class="form-control" type="text" name="price" placeholder="Set price">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4 class="text-center">CATEGORY(int!)</h4>
          <input class="form-control" type="text" name="category" placeholder="Input category (int)">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4 class="text-center">QUANTITY</h4>
          <input class="form-control" type="number" name="quantity" placeholder="Quantity">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4 class="text-center">CONTENT</h4>
        <textarea id="w3review" name="content" rows="4" cols="50"></textarea>
        </label>
      </div>
      <div class="form-group text-center">
      <input type="submit" class="btn btn-primary" value="Create product" name="submit">
      <a href="index.php?admin" class="btn btn-outline-danger">Back</a>
      </div>
      </div>
      </div>
    </div>
  </div>
</form>