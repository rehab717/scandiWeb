<?php

require_once("abstract/main.abstract.php");

class Product extends Main
{
    // FINDING ALL PRODUCTS

    public static function find_all()
    {
        return self::find_by_query("SELECT * FROM " . self::$db_table . " ");
    }

    // FINDING PRODUCT BY ID

    public static function find_by_id($id)
    {
        $result_array = self::find_by_query("SELECT * FROM " . self::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($result_array) ? array_shift($result_array) : false;
    }

    // INSTANTIATING PRODUCTS

    public static function find_by_query($sql)
    {
        global $database;

        $result_set = $database->query($sql);

        $object_array = array();
        $count = 0;

        while ($row = mysqli_fetch_array($result_set)) {

            $product = new self;
            $product->set_id($row['id']);
            $product->set_sku($row['sku']);
            $product->set_name($row['name']);
            $product->set_price($row['price']);
            $product->set_type($row['type']);
            $product->set_attribute($row['attribute']);

            $object_array[$count] = $product;
            $count += 1;
        }

        return $object_array;
    }

    // LOOPING THROUGH PROPERTIES

    protected function properties()
    {
        $properties = array();

        foreach (static::$db_table_fields as $db_field) {
            $properties[$db_field] = $this->$db_field;
        }

        return $properties;
    }

    // SANATIZING PROPERTIES

    protected function clean_properties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

    // CREATING DATA

    public function create()
    {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if ($database->query($sql)) {

            $this->id = $database->insert_id();

            return true;
        } else {

            return false;
        }
    }

    // DELETING DATA

    public function delete($id)
    {
        global $database;

        if (isset($_POST['ProductID'])) {

            $arr = $_POST['ProductID'];

            foreach ($arr as $id) {

                $sql = "DELETE FROM " . self::$db_table . "  ";
                $sql .= "WHERE id = " . $database->escape_string($id);

                $database->query($sql);
            }
        }
    }
}
