<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>
    Vor PHP
    <?php

      // This file checks if the login is valid, and rather the user is a 'user' or 'moderator'.
      // We use a SQL database to check the credentials.

      $globalSettings = include('rushb.conf');

      $mail = $_POST['loginMail'];
      $password = $_POST['loginPassw'];

      print_r($globalSettings('SQLdbname'));
      print_r('test');

      $sql = "SELECT mail FROM users WHERE mail='".$loginMail."'";

    ?>
    Nach PHP
  </body>
</html>
