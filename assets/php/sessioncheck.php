<?php
  session_start();
  if($_SESSION['login'] != 'user') {
    header('Location: ../login.php');
    die();
  }
?>
