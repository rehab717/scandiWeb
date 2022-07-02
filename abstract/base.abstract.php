<?php

include "classes/posts.class.php";

abstract class Main
{
    protected $Sku, $Name, $Price, $ProductType, $Attribute;

    abstract function setSku($Sku);

    abstract function setName($Name);

    abstract function setPrice($Price);

    abstract function setType($productType);

    abstract function setAttribute($Attribute);

    abstract function getListAttribute();
}
