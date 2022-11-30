<?php

interface Base
{
    // SETTERS

    public function set_id($id);

    public function set_sku($sku);

    public function set_name($name);

    public function set_price($price);

    public function set_type($type);

    public function set_attribute($attribute);

    // GETTERS

    public function get_id();

    public function get_sku();

    public function get_name();

    public function get_price();

    public function get_type();

    public function get_attribute();

    public function get_list_attribute();
}
