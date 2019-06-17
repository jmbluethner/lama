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
        // Write to config
        //////////////////////////
        date_default_timezone_set($config['timezone']);
        $time = date("Y-m-d H:i:s");
        $userName = $_SESSION["username"];
        $clientIP = $_SERVER["REMOTE_ADDR"];
        $file = 'lama.log';
        // Öffnet die Datei, um den vorhandenen Inhalt zu laden
        $current = file_get_contents($file);
        // Fügt eine neue Person zur Datei hinzu
        $current .= '['.$time.'] User '.$userName.' logged in. IP: '.$clientIP.PHP_EOL;
        file_put_contents($file,$current);


        header("Location: dashboard.php");
        die();
      } else {

        // Write to config
        date_default_timezone_set($config['timezone']);
        $time = date("Y-m-d H:i:s");
        $userName = $_SESSION["username"];
        $clientIP = $_SERVER["REMOTE_ADDR"];
        $file = 'lama.log';
        // Öffnet die Datei, um den vorhandenen Inhalt zu laden
        $current = file_get_contents($file);
        // Fügt eine neue Person zur Datei hinzu
        $current .= '['.$time.'] Login to Mail: '.$mail.' failed. IP: '.$clientIP.PHP_EOL;
        file_put_contents($file,$current);

        $_SESSION['attempted'] = "y";
        header("Location: login.php");
        die();
      }
    }
  }

  $conn->close();

?>
