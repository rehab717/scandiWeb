<?php

class Furniture extends Product
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
        $this->attribute = "Dimension: ";
        $final_str = "";

        $list_att = explode(',', $attribute);

        foreach ($list_att as $att) {
            $final_str .= trim(explode(':', $att)[1]) . "x";
        }

        $final_str = substr_replace($final_str, "", -2);

        $this->attribute .= $final_str;
    }

    // GETTER

    public function get_list_attribute()
    {
        return ['height', 'length', 'width'];
    }
}
