<?php

$product-> createProduct();

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>TITLE</h4>
          <input type="text" name="title" placeholder="input title">
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>AUTHOR</h4>
          <input type="text" name="author" placeholder="Input author name">
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>IMAGE</h4>
            <input type="file" name="image">
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>PRICE</h4>
          <input type="text" name="price" placeholder="Set price">
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>CATEGORY</h4>
          <input type="text" name="category" placeholder="Input category (int)">
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>QUANTITY(int)</h4>
          <input type="number" name="quantity" placeholder="Quantity">
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
        <label><h4>CONTENT</h4>
        <textarea id="w3review" name="content" rows="4" cols="50"></textarea>
        </label>
      </div>
      <div class="cell small-12 large-8 large-offset-2">
      <input type="submit" class="button" value="Create product" name="submit">
      <a href="index.php?admin" class="alert button">Back</a>
      </div>
    </div>
  </div>
</form>