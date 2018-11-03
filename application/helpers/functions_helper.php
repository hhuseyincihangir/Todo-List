<?php 
  function map($value, $fromLow, $fromHigh, $toLow, $toHigh) 
  {
    $fromRange = $fromHigh - $fromLow;
    $toRange = $toHigh - $toLow;
    $scaleFactor = $toRange / $fromRange;

    $tmpValue = $value - $fromLow;

    $tmpValue *= $scaleFactor;

    return $tmpValue + $toLow;
  }
?>