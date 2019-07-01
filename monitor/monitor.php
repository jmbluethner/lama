<?php
  function systemLoadInPercent($coreCount = 2,$interval = 1){
      $rs = sys_getloadavg();
      $interval = $interval >= 1 && 3 <= $interval ? $interval : 1;
      $load  = $rs[$interval];
      return round(($load * 100) / $coreCount,2);
  }
  echo systemLoadInPercent();
?>
