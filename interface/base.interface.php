<?php

interface Base
{
    public function set_id($id) : void;

    public function set_sku($sku) : void;

    public function set_name($name) : void;

    public function set_price($price) : void;

    public function set_type($type) : void;
    
    public function set_attribute($attribute) : void;

    public function get_id() : string;

    public function get_sku() : string;

    public function get_name() : string;

    public function get_price() : string;

    public function get_type() : string;

    public function get_attribute() : string;
}