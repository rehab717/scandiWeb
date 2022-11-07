<?php

require_once("interface/base.interface.php");

abstract class Main implements Base
{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $type;
    public $attribute;
    protected static $db_table = "scandiweb";
    protected static $db_table_fields = array('id', 'sku', 'name', 'price', 'type', 'attribute');

    // public function __construct($id, $sku, $name, $price, $type, $attribute)
    // {
    //     $this->id = $id;
    //     $this->sku = $sku; 
    //     $this->name = $name;
    //     $this->price = $price;
    //     $this->type = $type;
    //     $this->attribute = $attribute;
    // }

    public function set_id($id) : void
    {
        $this->id = $id;
    }

    public function set_sku($sku) : void
    {
        $this->sku = $sku;
    }

    public function set_name($name) : void 
    {
        $this->name = $name;
    }

    public function set_price($price) : void
    {
        $this->price = $price;
    }

    public function set_type($type) : void
    {
        $this->type = $type;
    }

    public function set_attribute($attribute) : void
    {
        $this->attribute - $attribute;
    }

    public function get_id() : string
    {
        return $this->id;
    }

    public function get_sku() : string
    {
        return $this->sku;
    }

    public function get_name() : string
    {
        return $this->name;
    }

    public function get_price() : string
    {
        return $this->price;
    }

    public function get_type() : string
    {
        return $this->type;
    }

    public function get_attribute(): string
    {
        return $this->attribute;
    }
}
