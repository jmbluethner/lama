<!DOCTYPE html>
<html>
  <head>
  </head>

  <body>
    <?php

      // This file checks if the login is valid, and rather the user is a 'user' or 'moderator'.
      // We use a SQL database to check the credentials.

      //$globalSettings = include('rushb_config.php');

      $mail = $_POST['loginMail'];
      $password = $_POST['loginPass'];

      //print_r($globalSettings('SQLdbname'));
      print_r($mail." : ".$password);

    ?>
    Nach PHP
  </body>
</html>
