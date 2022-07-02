<?php

class Furniture extends ProductMain
{
  public function setAttribute($attribute)
  {
    $this->Attribute = "Dimension: ";
    $finalStr = "";

    $listAtt = explode(',', $attribute);

    foreach($listAtt as $att) {
      $finalStr .= trim(explode(':', $att)[1]) . "x";
    }

    $finalStr = substr_replace($finalStr, "", -2);

    $this->Attribute .= $finalStr;
  }

  public function getListAttribute()
  {
    return ['height', 'length', 'width'];
  }
}
