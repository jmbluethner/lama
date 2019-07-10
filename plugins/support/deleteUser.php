<?php
  $mail = $_POST['mail'];

  $config = include('../../config.php');
  $SQLhost = $config['SQLhost'];
  $SQLdbname = $config['SQLdbname'];
  $SQLuser = $config['SQLuser'];
  $SQLpass = $config['SQLpass'];

  $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);

  $sql = "DELETE FROM users WHERE mail = '$mail'";
  $conn->query($sql);

  print_r('<script>history.go(-1)</script>');
?>
