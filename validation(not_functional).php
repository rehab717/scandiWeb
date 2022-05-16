<?php

class UserValidator {

  private $data;
  private $errors = [];
  private static $fields = ['SKU', 'Name', 'Price'];

  public function __construct($post_data){
    $this->data = $post_data;
  }

  public function validateForm(){
    foreach(self::$fields as $field){
      if(!array_key_exists($field, $this->data)){
        trigger_error("$field is not present");
        return;
      }
    }

    $this->validateSKU();
    $this->validateName();
    $this->validatePrice();
    return $this->errors;

  }

  public function validateSKU(){
    $val = trim($this->data['SKU']);
    if(empty($val)){
      $this->addError('SKU', 'SKU cannot be empty');
    } else {
      if(!preg_match('/^[a-zA-Z0-9]$/', $val)){
        $this->addError('SKU', 'Invalid input');
      }
    }
  }

  private function validateName(){
    $val = trim($this->data['Name']);
    if(empty($val)){
      $this->addError('Name', 'Name cannot be empty');
    } else {
      if(!preg_match('/^[a-zA-Z]$/', $val)){
        $this->addError('Name', 'Invalid input');
      }
    }
  }

  private function validatePrice(){
    $val = trim($this->data['Price']);
    if(empty($val)){
      $this->addError('Price', 'Price cannot be empty');
    } else {
      if(!preg_match('/^[0-9]$/', $val)){
        $this->addError('Price', 'Invalid input');
      }
    }
  }

  private function addError($key, $val){
    $this->errors[$key] = $val;
}
