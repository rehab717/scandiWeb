<?php

class DVD extends ProductMain
{
  public function setAttribute($attribute)
  {
    $addStr = " MB";
    $removeStr = rtrim($attribute, ",");
    $this->Attribute = $removeStr;
    $this->Attribute .= $addStr;
  }

  public function getListAttribute()
  {
    return ['Size'];
  }
}
