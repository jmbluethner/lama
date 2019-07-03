<?php
  ini_set('display_errors', 0);
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
    $_SESSION['attempted'] = "y";
    header("Location: login.php");
    die();
  } else {
    $_SESSION['attempted'] = "n";
    $sql = "SELECT * FROM users WHERE mail='$mail'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
      if(strtolower($row["password"]) == hash('sha512',$password)) {
        $_SESSION['login'] = 'user';
        $_SESSION['usermail'] = $mail;
        $_SESSION['username'] = $row['username'];

        //////////////////////////
        // Write to log
        //////////////////////////

        include "./assets/php/write-to-log.php";
        writeToLog('./config.php','./lama.log','User logged in');

        header("Location: dashboard.php");
        die();
      } else {

        //////////////////////////
        // Write to config
        //////////////////////////
        include "./assets/php/write-to-log.php";
        writeToLog('./config.php','./lama.log','Login FAILED!');

        $_SESSION['attempted'] = "y";
        header("Location: login.php");
        die();
      }
    }
  }

  $conn->close();

?>
