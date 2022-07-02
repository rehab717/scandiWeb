<?php

class ProductMain extends Main
{

    function __construct($sku, $name, $price, $productType, $attribute)
    {
        $this->Sku = $sku;
        $this->Name = $name;
        $this->Price = $price;
        $this->ProductType = $productType;
        $this->Attribute = $attribute;
    }

    // SETTERS FOR MAIN DATA

    public function setSku($Sku)
    {
        $this->Sku = $Sku;
    }

    public function setName($Name)
    {
        $this->firstName = $Name;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function setType($productType)
    {
        $this->productType = $productType;
    }

    public function setAttribute($attribute)
    {
        $this->Attribute = $attribute;
    }

    // GETTERS FOR MAIN DATA

    public function getSku()
    {
        return $this->Sku;
    }

    public function getName()
    {
        return $this->firstName;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function getType()
    {
        return $this->productType;
    }

    public function getAttribute()
    {
        return $this->Attribute;
    }

    public function getListAttribute(){
        
    }

    public function addPost()
    {
        $sql = "INSERT INTO pradd2(Sku, Name, Price, ProductType, Attribute) VALUES ('" . $this->Sku . "','" . $this->Name . "','" . $this->Price . "','" . $this->ProductType . "','" . $this->Attribute . "')";
        $stmt = Dbh::connect()->prepare($sql);
        $stmt->execute();
    }

    // GET FUNCTION

    public function getPost()
    {
        $sql = "SELECT * FROM pradd2";
        $stmt = Dbh::connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    // DELETE FUNCTION

    public function delPost($id)
    {
        $sql = "DELETE FROM pradd2 WHERE id = ? ";
        $stmt = Dbh::connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
