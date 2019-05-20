<?php
  ini_set('display_errors', 1);
  $config = include('config.php');
  $SQLhost = $config['SQLhost'];
  $SQLdbname = $config['SQLdbname'];
  $SQLuser = $config['SQLuser'];
  $SQLpass = $config['SQLpass'];
  $password = $_POST['loginPassword'];
  $mail = $_POST['loginMail'];

  $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT mail FROM users WHERE mail='$mail'";
  $result = $conn->query($sql);


  session_start();

  if ($result->num_rows == 0) {
    // Mail not found in db
    $_GET['attempted'] = "y";
    header("Location: login.php");
    die();
  } else {
    $_GET['attempted'] = "n";
    $sql = "SELECT password FROM users WHERE mail='$mail'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      if(strtolower($row["password"]) == hash('sha512',$password)) {
        $_SESSION['login'] = 'user';
        header("Location: dashboard.php");
        die();
      } else {
        $_GET['attempted'] = "y";
        header("Location: login.php");
        die();
      }
    }
  }

  $conn->close();

?>
