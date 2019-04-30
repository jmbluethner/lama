// Check PHP Session Login-State
// if loggedin == 1 => interface.php else => login.php
<!DOCTYPE html>
<html>
  <head>
    <?php include "./web-elements/php/head.php" ?>
    <?php
      if($_SESSION['loginstate']=='user' || $_SESSION['loginstate']=='admin') {
        header("Location: interface.php");
        die();
      } else {
        header("Location: login.php");
      }
    ?>
  </head>
  <body>
    Checking Login-State ...
  </body>
</html>
