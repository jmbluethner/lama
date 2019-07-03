<?php
  function writeToLog($configpath,$logpath,$content) {
    include($configpath);
    date_default_timezone_set($config['timezone']);
    $time = date("Y-m-d H:i:s");
    $userName = $_SESSION["username"];
    $clientIP = $_SERVER["REMOTE_ADDR"];
    // Öffnet die Datei, um den vorhandenen Inhalt zu laden
    $current = file_get_contents($logpath);
    // Fügt eine neue Person zur Datei hinzu
    $current .= '['.$time.' | '.$userName.' :: '.$clientIP.'] '.$content.PHP_EOL;
    file_put_contents($logpath,$current);
  }
?>
