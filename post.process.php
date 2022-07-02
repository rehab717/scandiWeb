<?php

include "abstract/base.abstract.php";
include "classes/main.class.php";
include "classes/disk.class.php";
include "classes/furniture.class.php";
include "classes/book.class.php";

// SANATIZE FUNCTION 

function sanatize($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}

// DATA HANDLING

if (isset($_POST["save"])) {

  $InsertData = null;
  $productType = $_POST["productType"];
  $Attribute = "";

  if (!empty($productType)) {

    $availableProducts = ["DVD", "Furniture", "Book"];

    if (in_array($productType, $availableProducts)) {

      $InsertData = new $productType(sanatize($_POST['Sku']), sanatize($_POST['firstName']), sanatize($_POST['Price']), sanatize($productType), '');
      $lisAttribute = $InsertData->getListAttribute();

      foreach ($lisAttribute as $att) {
        $Attribute .= isset($_POST[$att]) ? " " . $att . ": " . $_POST[$att]. ", " : "";
      }

      $InsertData->setAttribute(sanatize($Attribute));

      $InsertData->addPost();

      header("location:index.php?status=added");
    }
  }
}

// DELETING DATA

else if (isset($_POST['delete'])) {
  $InsertData = new ProductMain('', '', '', '', '');
  $id = $_POST['ProductID'];
  $N = count($id);
  for ($i = 0; $i < $N; $i++) {
    $InsertData->delPost($id[$i]);
  }
  header("location:index.php?status=deleted");
}
