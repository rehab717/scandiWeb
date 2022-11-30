<?php

class Validator
{
  private $sku, $name, $price, $product_type;
  private $errors = [];

  public function __construct($sku, $name, $price, $product_type)
  {
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->product_type = $product_type;
  }

  // RETURNING ERRORS 


  public function validate_form()
  {
    $this->validate_sku();
    $this->validate_name();
    $this->validate_price();
    $this->validate_product_type();
    return $this->errors;
  }

  // VALIDATING SKU

  private function validate_sku()
  {
    $val = $this->sku;
    if (empty($val)) {
      $this->add_error('Sku', 'Please, submit required data');
    } else {
      if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $val)) {
        $this->add_error('Sku', 'Please, provide the data of indicated type');
      }
    }
  }

  // VALIDATING NAME

  private function validate_name()
  {
    $val = $this->name;
    if (empty($val)) {
      $this->add_error('Name', 'Please, submit required data');
    } else {
      if (!preg_match('/^[a-zA-Z -]*$/', $val)) {
        $this->add_error('Name', 'Please, provide the data of indicated type');
      }
    }
  }

  // VALIDATING PRICE

  private function validate_price()
  {
    $val = $this->price;
    if (empty($val)) {
      $this->add_error('Price', 'Please, submit required data');
    } else {
      if (!preg_match('/^[0-9]*$/', $val)) {
        $this->add_error('Price', 'Please, provide the data of indicated type');
      }
    }
  }

  // VALIDATING PRODUCTYPE

  private function validate_product_type()
  {
    $val = $this->product_type;
    if (empty($val)) {
      $this->add_error('ProductType', 'Please, submit required data');
    } else {
      if (!preg_match('/^[a-zA-Z -]*$/', $val)) {
        $this->add_error('ProductType', 'Please, provide the data of indicated type');
      }
    }
  }

  // ADDING ERRORS

  private function add_error($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
