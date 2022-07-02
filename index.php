<?php
require_once "templates/header.php";
include "classes/posts.class.php";
?>

<form id="product_form" action="post.process.php" method="POST">
     <div class="row my-5">
          <div class="col-md-6 text-left">
               <h3>PRODUCT LIST</h3>
          </div>
          <div class="col-md-6 text-right">
               <a href="PAindex.php" class="btn btn-primary">
                    ADD
               </a>
               <button type="submit" name="delete" class="btn btn-danger">
                    MASS DELETE
               </Button>
          </div>
     </div>
     <hr style="width:100%">
     <div class="row">
          <?php
          $posts = new Posts('','','','','');
          if ($posts->getPost()) {
               foreach ($posts->getPost() as $post) {
                    echo '<div class="col-md-3 mt-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<input class=".delete-checkbox" type="checkbox" name="ProductID[]" value="' . $post['id'] . '" />';
                    echo "<p id = 'sku' class='text-center' class='card-text'>" . $post['Sku'] . "</p>";
                    echo "<p id = 'name' class='text-center' class='card-text'>" . $post['Name'] . "</p>";
                    echo "<p id = 'price' class='text-center' class='card-text'>" . $post['Price'] . " $</p>";
                    echo "<p id = 'attribute' class='text-center' class='card-text'>" . $post['Attribute'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
               }
          }
          ?>
     </div><br><br>
</form>

<?php
require_once "templates/footer.php"
?>