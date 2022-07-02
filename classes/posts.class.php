<?php

include "dbh.class.php";

class Posts
{
    // PROPERTIES AND CONSTRUCTOR

    private $Sku, $Name, $Price, $ProductType, $Attribute;

    public function __construct($sku, $name, $price, $productType, $attribute)
    {
        $this->Sku = $sku;
        $this->Name = $name;
        $this->Price = $price;
        $this->productType = $productType;
        $this->Attribute = $attribute;
    }

    // ****CRUD OPERATIONS**** 

    // INSERT FUNCTION

    public function addPost()
    {
        $sql = "INSERT INTO pradd2(Sku, firstName, Price, productType, Attribute) VALUES ('" . $this->Sku . "','" . $this->Name . "','" . $this->Price . "','" . $this->ProductType . "','" . $this->Attribute . "')";
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
