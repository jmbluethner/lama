<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>RushB - PHP Server Interface</title>
    <link rel="stylesheet" href="./assets/css/login.css"/>
  </head>
  <body>
    <section>
      <form method="POST" action="checkLogin.php">
        <input class="textinput" name="loginMail" type="text" placeholder="mail"/><br>
        <input class="textinput" name="loginPass" type="password" placeholder="password"/><br>
        <button class="submit" type="submit">Sign Up</button>
      </form>
    </section>
  </body>
</html>

<?php

  // This page is where you can Enter your Login-Information, if any of the pages redirected to it

?>
