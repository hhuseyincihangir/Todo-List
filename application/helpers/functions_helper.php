<?php 
  function map($value, $fromLow, $fromHigh, $toLow, $toHigh) 
  {
    $fromRange = $fromHigh - $fromLow;
    $toRange = $toHigh - $toLow;
    if ($fromRange==0)
    {
      $scaleFactor=0;
    }
    else{
      $scaleFactor = $toRange / $fromRange;
    }

    $tmpValue = $value - $fromLow;

    $tmpValue *= $scaleFactor;

    return $tmpValue + $toLow;
  }
?>