<?php

class Book extends ProductMain
{
    public function setAttribute($attribute)
    {
        $addStr = " KG";
        $removeStr = rtrim($attribute, ",");
        $this->Attribute = $removeStr;
        $this->Attribute .= $addStr;
    }

    public function getListAttribute()
    {
        return ['Weight'];
    }
}
