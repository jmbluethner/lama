<?php

  session_start();
  if($_SESSION['login'] != 'user') {
    header('Location: ../../login.php');
    die();
  }

  $config = include('../../config.php');
  $SQLhost = $config['SQLhost'];
  $SQLdbname = $config['SQLdbname'];
  $SQLuser = $config['SQLuser'];
  $SQLpass = $config['SQLpass'];

  $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);

  if ($conn->connect_error) {
      die('<div class="sbox_message"><span>LAMA Bot</span><br>I could not connect to the Database. Sorry Mister :C</div>');
  }

  $sql = "SELECT * FROM shoutbox ORDER BY id DESC LIMIT 10";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
      print_r('<div class="sbox_message"><span>'.$row["username"].'</span><br>'.$row["message"].'</div>');
    }
  } else {
    print_r('<div class="sbox_message"><span>LAMA Bot</span><br>A bit quit here huh?</div>');
  }
?>
