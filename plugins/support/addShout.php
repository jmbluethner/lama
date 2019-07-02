<?php
  session_start();
  // Username: $_SESSION['username']
  // Message: $_POST['message']
  $user = $_SESSION['username'];
  $message = $_POST['message'];

  $config = include('../../config.php');
  $SQLhost = $config['SQLhost'];
  $SQLdbname = $config['SQLdbname'];
  $SQLuser = $config['SQLuser'];
  $SQLpass = $config['SQLpass'];

  $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);

  $sql = "INSERT INTO shoutbox (username,message) VALUES ('$user','$message')";
  $result = $conn->query($sql);

  print_r('<script>history.go(-1)</script>');
?>
