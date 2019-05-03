// Check PHP Session Login-State
// if loggedin == 1 => interface.php else => login.php
<!DOCTYPE html>
<html>
  <head>
    <?php 
      // Check if user has valid Session
      include "./web-elements/php/head.php";
      include "checkSession.php";
      checkSession();
    ?>
    <!-- If the PHP hasn't micked in, in order to redirect the user to the login page, we redirect him to the content. -->
    <meta http-equiv='refresh' content='0; URL=interface.php'>
  </head>
  <body>
    Checking Login-State ...
  </body>
</html>
