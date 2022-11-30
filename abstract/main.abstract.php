<?php

require_once("interface/base.interface.php");

abstract class Main implements Base
{
    public $id, $sku, $name, $price, $type, $attribute;

    protected static $db_table = "scandiweb";
    protected static $db_table_fields = array('id', 'sku', 'name', 'price', 'type', 'attribute');

    // SETTERS

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_sku($sku)
    {
        $this->sku = $sku;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_price($price)
    {
        $this->price = $price;
    }

    public function set_type($type)
    {
        $this->type = $type;
    }

    public function set_attribute($attribute)
    {
        $this->attribute = $attribute;
    }

    // GETTERS

    public function get_id()
    {
        return $this->id;
    }

    public function get_sku()
    {
        return $this->sku;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_attribute()
    {
        return $this->attribute;
    }

    public function get_list_attribute()
    {
    }
}
