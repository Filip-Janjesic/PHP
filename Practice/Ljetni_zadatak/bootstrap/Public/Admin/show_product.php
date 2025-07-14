<?php

$result = $product -> showProducts();
if(isset($_GET['delete'])){
    $product-> deleteProducts($_GET['delete']);
}

?>
<a href="index.php?productAdd" class="btn btn-primary">Add product</a>

<div class="container">

   <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
      <thead class="thead-dark">
         <tr>
      <th class="">TIITLE</th>
      <th class="">AUTHOR</th>
      <th class="">IMAGE</th>
      <th class="">PRICE</th>
      <th class="">CATEGORY</th>
      <th class="">QUANTITY</th>
      <th class="">CONTENT</th>
      <th></th>
         </tr>
      </thead>
      <tbody>
    <?php for ($i=0; $i < count($result); $i++) { ?>
    <tr>
      <td class="text-center" ><h5><?php echo $result[$i]['title'];?></h5></td>
      <td class="text-center"><h5><?php echo $result[$i]['author'];?></h5></td>
      <td class="text-center" ><img style="max-width:120px" src="images/<?php echo $result[$i]['image'];?>"></td>
      <td class="text-center" ><h5><?php echo $result[$i]['price'];?>$</h5></td>
      <td class="text-center" ><h5><?php echo $result[$i]['category'];?></h5></td>
      <td class="text-center" ><h5><?php echo $result[$i]['quantity'];?></h5></td>
      <td class="text-center" ><h5><?php echo $result[$i]['content'];?></h5></td>
      <td class="text-center"><a href="index.php?productChange=<?php echo $result[$i]['id'];?>" class="btn btn-primary">Change</a>
      <hr><a href="index.php?admin&delete=<?php echo $result[$i]['id'];?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
<h3>Database diagram</h3>
<hr>
<img style="" src="Diagram.png">
<hr>
   


</div>
<!-- /.container -->