<?php

class DVD extends Product
{
    // CONSTRUCTING PROPERTIES

    function __construct($sku, $name, $price, $type, $attribute)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->attribute = $attribute;
    }

    // SETTER

    public function set_attribute($attribute)
    {
        $add_str = " MB";
        $remove_str = rtrim($attribute, ",");
        $this->attribute = $remove_str;
        $this->attribute .= $add_str;
    }

    // GETTER

    public function get_list_attribute()
    {
        return ['Size'];
    }
}
