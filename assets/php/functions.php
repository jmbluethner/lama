<?php
  ini_set('display_errors', 0);
  function checkSQL() {
    $config = include('config.php');
    $SQLhost = $config['SQLhost'];
    $SQLdbname = $config['SQLdbname'];
    $SQLuser = $config['SQLuser'];
    $SQLpass = $config['SQLpass'];
    $conn = new mysqli($SQLhost, $SQLuser, $SQLpass);
    if ($conn->connect_error) {
      return false;
    }
    return true;
  }
?>
