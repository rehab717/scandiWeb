<?php

class UserValidator
{

  private $data;
  private $errors = [];
  private static $fields = ['Sku', 'firstName', 'Price'];

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validateForm()
  {
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("$field is not present");
        return;
      }
    }

    $this->validateSKU();
    $this->validateName();
    $this->validatePrice();
    return $this->errors;
  }

  private function validateSKU()
  {
    $val = trim($this->data['Sku']);
    if (empty($val)) {
      $this->addError('Sku', 'Please, submit required data');
    } else {
      if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $val)) {
        $this->addError('Sku', 'Please, provide the data of indicated type');
      }
    }
  }

  private function validateName()
  {
    $val = trim($this->data['firstName']);
    if (empty($val)) {
      $this->addError('firstName', 'Please, submit required data');
    } else {
      if (!preg_match('/^[a-zA-Z -]*$/', $val)) {
        $this->addError('firstName', 'Please, provide the data of indicated type');
      }
    }
  }

  private function validatePrice()
  {
    $val = trim($this->data['Price']);
    if (empty($val)) {
      $this->addError('Price', 'Please, submit required data');
    } else {
      if (!preg_match('/^[0-9]*$/', $val)) {
        $this->addError('Price', 'Please, provide the data of indicated type');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
