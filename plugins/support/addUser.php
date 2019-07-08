<?php
  $pass = $_POST['password'];
  $mail = $_POST['mail'];
  $role = $_POST['role'];
  $user = $_POST['username'];

  $config = include('../../config.php');
  $SQLhost = $config['SQLhost'];
  $SQLdbname = $config['SQLdbname'];
  $SQLuser = $config['SQLuser'];
  $SQLpass = $config['SQLpass'];

  $pass = hash('sha512',$pass);

  $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);

  $sql = "INSERT INTO users (username,password,role,mail) VALUES ('$user','$pass','$role','$mail')";
  $conn->query($sql);

  print_r('<script>history.go(-1)</script>');
?>
