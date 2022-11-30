<?php

require("template/header.php");

// SANATIZING DATA

function sanatize($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);

  return $data;
}

// DATA HANDLING 

$errors = [];

if (isset($_POST['productType']) && isset($_POST["Save"])) {

  $product_type = sanatize($_POST['productType']);
  $sku = sanatize($_POST['sku']);
  $name = sanatize($_POST['name']);
  $price = sanatize($_POST['price']);

  $validation = new Validator($sku, $name, $price, $product_type);
  $errors = $validation->validate_form();

  if (count($errors) <= 0) {

    $product_data = null;
    $attribute = "";
    $available_products = ["DVD", "Furniture", "Book"];

    if (in_array($product_type, $available_products)) {

      $product_data = new $product_type($sku, $name, $price, $product_type, "");
      $list_attributes = $product_data->get_list_attribute();

      foreach ($list_attributes as $att) {
        $attribute .= isset($_POST[$att]) ? " " . $att . ": " . $_POST[$att] . ", " : "";
      }

      $product_data->set_attribute(sanatize($attribute));

      $product_data->create();

      header("location:index.php?status=added");
    }

    // ERROR HANDLING

  } else {

    $error = "";

    foreach ($errors as $key => $value) {
      $error .= "&" . $key . "=" . $value;
    }

    header("location:product.php?status=validated" . $error);
  }
}

// DELETING DATA

else if (isset($_POST['delete'])) {

  $product = new Product();
  $product->delete($id);

  header("location:index.php?status=deleted");
}
