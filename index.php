<?php
require_once "template/header.php";
?>

<?php $products = Product::find_all() ?>

<form id="product_form" action="process.php" method="POST">
     <div class="row my-5">
          <div class="col-md-4 text-left">
               <h3><i>PRODUCT LIST</i></h3>
          </div>
          <div class="col-md-4 text-center">
               <img class="picture" style="width:200px;height:auto;" src="https://www.marello.com/wp-content/uploads/2019/04/Scandiweb_logo-1.png">
          </div>
          <div class="col-md-4 text-right">
               <a href="product.php" class="btn btn-primary">
                    ADD
               </a>
               <button type="submit" name="delete" class="btn btn-danger">
                    MASS DELETE
               </Button>
          </div>
     </div>

     <hr style="width:100%">

     <div class="row">
          <?php foreach ($products as $product) : ?>
               <div class="col-md-3 mt-4">
                    <div class="card">
                         <div class="card-body">
                              <input class=".delete-checkbox" type="checkbox" name="ProductID[]" value="<?php echo $product->get_id() ?>" />
                              <p id='sku' class='text-center' class='card-text'><?php echo $product->get_sku() ?></p>
                              <p id='name' class='text-center' class='card-text'><?php echo $product->get_name() ?></p>
                              <p id='price' class='text-center' class='card-text'><?php echo $product->get_price() ?></p>
                              <p id='attribute' class='text-center' class='card-text'><?php echo $product->get_attribute() ?></p>
                         </div>
                    </div>
               </div>
          <?php endforeach; ?>
     </div>
</form><br><br>



<?php
require_once "template/footer.php"
?>