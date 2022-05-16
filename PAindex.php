<?php
  require_once("./templates/header.php");
  include "classes/dbh.class.php";
  include "classes/posts.class.php";
?>

<style>
  .error{
    color:red;
  }
</style>

  <div class="text-left my-5">
    <h3 class="my-0 mr-md-auto font-weight-normal">PRODUCT ADD</h3>
  </div>
    <hr style="width:100%">
  <div class="row">
    <div class="col-md-3 mx-auto">
      <!-- form input -->
      <form method="POST" action="post.process.php" id = "product_form">
        <div class="text-right">
          <button type="submit" value = "insert" name = "Save" class="btn btn-primary">SAVE</button>
          <a href="index.php" class="btn btn-secondary">CANCEL</a>
        </div>
        <form class = "form" id="productType">
        <div class="form-group">
          <label>SKU: </label>
          <input id= "sku" class="form-control" name="SKU" type="text" >
          <span class = "error"  ><?php if(!empty($_GET['skuError'])){echo $_GET['skuError'];}?></span>
        </div>
        <div class="form-group">
          <label>Name: </label>
          <input id= "name" class="form-control"  name="Name" type="text" >
          <span class = "error"  ><?php if(!empty($_GET['nameError'])){echo $_GET['nameError'];}?></span>
        </div>
        <div class="form-group">
          <label>Price: </label>
          <input id= "price" class="form-control" name="Price" type="float" >
          <span class = "error"  ><?php if(!empty($_GET['priceError'])){echo $_GET['priceError'];}?></span>
        </div>

        	<div>
            <select id="productType" name="ProductType" onchange="yesnoCheck(this);">
                <option value="">Select</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
            </select>
            <label for="selector">Type Switcher</label><br>
            <span class = "error"  ><?php if(!empty($_GET['typeError'])){echo $_GET['typeError'];}?></span>

                </div>

        <div id="adc" style="display: none;" class="form-group">
            <label for="SIZE"><strong>SIZE</strong></label><br/>
            <input class="form-control" type="number" id="size" name="Size" /><br />
            <?php
            echo "Please, input the Size"
            ?>
        </div>
        <div id="pc" style="display: none;" class="form-group">
            <label for="FURNITURE"><strong>DIMENSION</strong></label><br/>
            Height (CM): <br/><input class="form-control" type="number" id="height" name="Height" /><br />
            Width (CM): <br/><input class="form-control" type="number" id="width" name="Width" /><br />
            Length (CM): <br/><input class="form-control" type="number" id="length" name="Length" /><br />
            <?php
            echo "Please, input the Dimensions"
            ?>
        </div>
        <div id="ps" style="display: none;" class="form-group">
            <label for="WEIGHT"><strong>WEIGHT </strong></label><br/>
            <input class="form-control" type="number" id="weight" name="Weight" /><br />
            <?php
            echo "Please, input the Weight"
            ?>
        </div>
        </form>
    </div>
  </div>

  <script type="text/javascript">
  	function yesnoCheck(that)
  {
      if (that.value == "DVD")
      {
          document.getElementById("adc").style.display = "block";
      }
      else
      {
          document.getElementById("adc").style.display = "none";
      }
      if (that.value == "Furniture")
      {
          document.getElementById("pc").style.display = "block";
      }
      else
      {
          document.getElementById("pc").style.display = "none";
      }
      if (that.value == "Book")
      {
          document.getElementById("ps").style.display = "block";
      }
      else
      {
          document.getElementById("ps").style.display = "none";
      }
  }
  </script>

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
