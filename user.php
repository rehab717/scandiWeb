<?php
require_once "template/header.php";
?>

<?php

// $user = User::find_by_id(6);
// $user->sku = "lol";
// $user->name = "sonia";
// $user->price = "priceless";

// $user->update();

$user = new User();

if (isset($_POST['Save'])){
  if ($user){
    $user->sku = $_POST['sku'];
    $user->name = $_POST['name'];
    $user->price = $_POST['price'];

    $user->create();

    
  }

  header("index.php");
}



?>

<form id="product_form" action="" method="POST">
  <div class="row my-5">
    <div class="col-md-6 text-left">
      <h3>PRODUCT ADD</h3>
    </div>
    <div class="col-md-6 text-right">
      <a href="index.php" name="Cancel" class="btn btn-secondary">
        CANCEL
      </a>
      <button type="submit" value="insert" name="Save" class="btn btn-primary">
        SAVE
      </Button>
    </div>
  </div>
  <hr style="width:100%">
  </br>
  <div class="row col-sm-10 offset-3">
    <p><strong><i>All fields are mandatory for submission, please submit all the required data</i></strong></p>
  </div><br>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">SKU</label>
    <div class="col-sm-3">
      <input name="sku" type="varchar" class="form-control" placeholder="[A-Z] [1-9]" id="sku">
      <span class="error"><?= $_GET['Sku'] ?? '' ?></span>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-3">
      <input name="name" type="text" class="form-control" placeholder="Please type your name" id="name">
      <span class="error"><?= $_GET['Name'] ?? '' ?></span>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Price ($)</label>
    <div class="col-sm-3">
      <input name="price" type="number" class="form-control" placeholder="Price" id="price">
      <span class="error"><?= $_GET['Price'] ?? '' ?></span>
    </div>
  </div>
  <div class="dropdown form-group row">
    <label class="col-sm-2 col-form-label">Type Switcher</label>
    <div class="col-sm-3">
      <select class="dropdown-toggle form-control" type="button" id="productType" name="productType" onchange="getCall(this.value);">
        <option value="">Type Switcher</option>
        <option value="DVD">DVD-Disc</option>
        <option value="Furniture">Furniture</option>
        <option value="Book">Book</option><br>
      </select>
      <span class="error"><?php echo $_GET['ProductType'] ?? '' ?></span>
    </div>
  </div><br>
  <div id="DVD" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Size (MB)</label>
      <div class="col-sm-2">
        <input name="Size" type="number" class="form-control" id="size"><br>
        <strong><?php echo "Please, provide size" ?></strong>
      </div>
    </div>
  </div>
  <div for="Dimensions" name="dimensions" id="Furniture" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Height (CM)</label>
      <div class="col-sm-2">
        <input name="height" type="number" class="form-control" id="height">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Width (CM)</label>
      <div class="col-sm-2">
        <input name="width" type="number" class="form-control" id="width">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Length (CM)</label>
      <div class="col-sm-2">
        <input name="length" type="number" class="form-control" id="length"><br>
        <strong><?php echo "Please, provide dimensions" ?></strong>
      </div><br>
    </div>
  </div>
  <div id="Book" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Weight (CM)</label>
      <div class="col-sm-2">
        <input name="Weight" type="number" class="form-control" id="weight"><br>
        <strong><?php echo "Please, provide weight" ?></strong>
      </div><br>
    </div>
  </div>
</form></br>

<?php
require_once "template/footer.php"
?>