<?php

$product-> updateProducts($_GET['productChange']);

if(isset($_GET['productChange'])){
    $result=$product->showProductsId($_GET['productChange']);
}


?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group row">
    <div class="col-sm-5">
      <div class="form-group text-center">
        <label><h4>TITLE</h4>
          <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title']?>">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4>AUTHOR</h4>
          <input class="form-control" type="text" name="author" value="<?php echo $result[0]['author']?>">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4>IMAGE</h4>
            <input class="form-control" type="file" name="image">
            <img style="max-width:200px" src="images/<?php echo $result[0]['image'];?>">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4>PRICE</h4>
          <input class="form-control" type="text" name="price" value="<?php echo $result[0]['price']?>">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4>CATEGORY</h4>
          <input class="form-control" type="text" name="category" value="<?php echo $result[0]['category']?>"">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4>QUANTITY(int)</h4>
          <input class="form-control" type="number" name="quantity" value="<?php echo $result[0]['quantity']?>">
        </label>
      </div>
      <div class="form-group text-center">
        <label><h4>CONTENT</h4>
        <textarea class="form-control" id="w3review" name="content" rows="4" cols="50"><?php echo $result[0]['content']?></textarea>
        </label>
      </div>
      <div class="form-group text-center">
      <input type="submit" class="btn btn-primary" value="Update product" name="submit">
      <a href="index.php?admin" class="btn btn-outline-danger">Back</a>
      </div>
      </div>
      </div>
    </div>
  </div>
</form>