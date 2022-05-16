<?php
include "classes/dbh.class.php";
include "classes/posts.class.php";
require_once("./templates/header.php");
?>

<!-- Button trigger modal -->
<form id = "product_form" action ="post.process.php" method = "post">
<div class="row my-5">
    <div class="col-md-6 text-left"><h3>PRODUCT LIST</h3></div>
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
    $posts = new Posts();
    if($posts->getPost()) {
      foreach($posts->getPost() as $post) {
        echo '<div class="col-md-3 mt-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<input class=".delete-checkbox" type="checkbox" name="ProductID[]" value="'.$post['id'].'" />';
        echo "<p id = 'sku' class='text-center' class='card-text'>" . $post['SKU'] . "</p>";
        echo "<p id = 'name' class='text-center' class='card-text'>" . $post['Name'] . "</p>";
        echo "<p id = 'price' class='text-center' class='card-text'>" . $post['Price'] . " $</p>";
        if($post['ProductType']=='DVD'){
        echo "<p id = 'size' class='text-center' class='card-text'>Size: " . $post['Size'] . "</p>";
        }
        if($post['ProductType']=='Furniture'){
        echo "<p id = 'height' class='text-center' class='card-text'>Dimension: " . $post['Height'] . " x " .
        $post['Width'] . " x " . $post['Length'] . "</p>";
        }
        if($post['ProductType']=='Book'){
        echo "<p id = 'weight' class='text-center' class='card-text'>Weight: " . $post['Weight'] . "</p>";
                }
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
    }  else {
      echo "<p class='mt-5 mx-auto'></p>";
    }
  ?>
</div>
</form>

<?php
 require_once("./templates/footer.php");
?>

<html>

<head>
	<style>
		#footer {
			position: fixed;
			padding: 10px 10px 0px 10px;
			bottom: 0;
			width: 100%;
			/* Height of the footer*/
			height: 40px;
			background: grey;
		}
	</style>

	<head>

		<body>
			<center>
				<div id="container">

					<div id="footer">Scandiweb Test assignment
				</div>
				</div>
			</center>
		</body>
		<html>
