<?php

class User
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
    //     parent::__construct($id, $sku, $name, $price, $type, $attribute);
    // }

    public static function find_all()
    {
        return self::find_by_query("SELECT * FROM " . self::$db_table . " ");
    }

    public static function find_by_id($id)
    {
        $result_array = self::find_by_query("SELECT * FROM " . self::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_query($sql)
    {
        global $database;

        $result_set = $database->query($sql);
        $object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $object_array[] = self::instantiation($row);
        }

        return $object_array;
    }

    public static function instantiation($the_record)
    {
        $calling_class = get_called_class();

        $the_object = new $calling_class;

        foreach ($the_record as $the_attribute => $value) {

            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties()
    {
        $properties = array();

        foreach (static::$db_table_fields as $db_field) {
            $properties[$db_field] = $this->$db_field;
        }

        return $properties;
    }

    protected function clean_properties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

    public function create()
    {
        global $database;
        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if ($database->query($sql)){

            $this->id = $database->the_insert_id();

            return true;

        } else {

            return false;

        }
    }

    public function delete()
    {
        global $database;

        $sql = "DELETE FROM " . self::$db_table . "  ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function update()
    {
        global $database;
        $properties = $this->clean_properties();
        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= "WHERE id=" . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
}
