<?php
  session_start();
  $_SESSION['login'] = "user";
  header('Location: index.php');
  die();
?>
