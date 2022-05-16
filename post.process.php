<?php

include "classes/dbh.class.php";
include "classes/posts.class.php";

$newObj = new Posts();

if(isset($_POST['Save']))
{

  if(empty($_POST['SKU']) || empty($_POST['Name']) || empty($_POST['Price']) || empty($_POST['ProductType']) ){
    if(empty($_POST['SKU'])){
      $skuError = "Please submit required data";
    }
    if(empty($_POST['Name'])){
      $nameError = "Please submit required data";
    }
    if(empty($_POST['Price'])){
      $priceError = "Please submit required data";
    }
    if(empty($_POST['ProductType'])){
      $typeError = "Please submit required data";
    }


    $valid = array(
      "skuError" => $skuError,
      "nameError" => $nameError,
      "priceError" => $priceError,
      "typeError" => $typeError,
    );

    $valid_url = http_build_query($valid);
    header("location:PAindex.php?status=added&".$valid_url);

  }else{

    if(!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $_POST['SKU']) || !preg_match('/^[a-zA-z -]*$/', $_POST['Name']) || !preg_match('/^[0-9]*$/', $_POST['Price']) ){

      if(!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $_POST['SKU'])){
        $skuError= "Invalid input";
      }


      if(!preg_match('/^[a-zA-Z -]*$/', $_POST['Name'])){
        $nameError= "invalid input";
      }

      if(!preg_match('/^[0-9]*$/', $_POST['Price'])){
        $priceError =  "Invalid input";
      }

      $valid = array(
      "skuError" => $skuError,
      "nameError" => $nameError,
      "priceError" => $priceError,
    );

    $valid_url = http_build_query($valid);
    header("location:PAindex.php?status=added&".$valid_url);

      } else {


    if(isset($_POST['Save']))
    {
      $SKU = $_POST['SKU'];
      $firstname = $_POST['Name'];
      $theprice = $_POST['Price'];
      $ProductType= $_POST['ProductType'];
      $Size= $_POST['Size'];
      $Height= $_POST['Height'];
      $Width= $_POST['Width'];
      $Length= $_POST['Length'];
      $Weight= $_POST['Weight'];

      $newObj->addPost($SKU, $firstname, $theprice,$ProductType,$Size,$Height,$Width,$Length,$Weight);

      }

      header("location:index.php?status=added");
  }

    }
  }


else if(isset($_POST['delete'])) {


    $id = $_POST['ProductID'];
    $N = count($id);
    for($i=0; $i < $N; $i++)
    {
    $newObj->delPost($id[$i]);
    }
    header("location:index.php?status=deleted");

  }
