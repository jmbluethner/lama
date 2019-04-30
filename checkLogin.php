<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>
    <?php

      // This file checks if the login is valid, and rather the user is a 'user' or 'moderator'.
      // We use a SQL database to check the credentials.

      $globalSettings = inlude('rushb.conf');

      $mail = $_GET['loginMail'];
      $password = $_GET['loginPassw'];

      print_r($globalSettings('SQLdbname'));
      print_r('test');

      $sql = "SELECT mail FROM users WHERE mail='".$loginMail."'";

    ?>
  </body>
</html>
