<!DOCTYPE html>
<html lang="de">
  <head>
    <title>LAMA Server Manager - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="author" content="JΔMØ,NTD">
    <meta name="description" content="The advanced CS:GO Server Interface">
    <meta property="og:image" content="/assets/img/favicon.png">
    <meta property="og:description" content="The advanced CS:GO Server Interface">
    <meta property="og:title" content="LAMA Server Manager - Login">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="Lan, Intranet, DIE-LAN, Interface, Query, Source, CS:GO, Counter-Strike">
    <meta itemprop="copyrightHolder" content="Jamo">
    <meta itemprop="copyrightYear" content="2019">
    <meta itemprop="isFamilyFriendly" content="True">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="LAMA Server Manager - Login">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="orange">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="./favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.css">
    <link rel="stylesheet" href="./assets/css/login.css" type="text/css">
    <meta name="theme-color" content="#3b3b3b">
        <link rel="stylesheet" href="./assets/css/alert.css" type="text/css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">

     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
  <body>
    <section class="login__mainsection bg__cover">
      <div class="login__frame">
        <div class="login__logo"></div>

        <!-- LOGIN -->

        <form autocomplete="false" action="./checkLogin.php" class="login__form" method="post">
          <input type="email" placeholder="E-Mail" name="loginMail" />
          <input type="password" placeholder="Passwort" name="loginPassword" />
          <button type="submit" name="requestLogin">Login</button>
        </form>
        <span class="login__hinttext">
          <a onclick="toggleLightbox('forgotPassword')">Passwort vergessen?</a>
        </span>
      </div>
    </section>

    <!-- Passwort vergessen -->

    <div class="lightbox__container" id="forgotPassword">
      <div class="lightbox__box">
        <div class="lightbox__topbar">
          <span class="lightbox__topbar_title">
            Passwort zurücksetzen
          </span>
          <span class="lightbox__topbar_close">
            <button onclick="toggleLightbox('forgotPassword')">X</button>
          </span>
        </div>
        <form class="lightbox__form">
          <input type="email" placeholder="E-Mail" class="lightbox__input__text"/>
          <button type="submit">Reset Mail senden</button>
        </form>
      </div>
    </div>
    <div class="alertcontainer" style="margin-top: 0 !important;" id="alertcontainer"></div>
    <script src="./assets/js/functions.js"></script>
    <?php

      session_start();

      include "./assets/php/functions.php";
      if(isset($_SESSION['attempted'])) {
        if($_SESSION['attempted'] == "y") {
          print_r("<script>spawnAlert('error','Invalid login Data');</script>");
        }
        if(!checkSQL()) {
          print_r("<script>spawnAlert('error','SQL not connected!'); console.log('SQL Connection lost');</script>");
        }
      }

      $config = include('config.php');
      $SQLhost = $config['SQLhost'];
      $SQLdbname = $config['SQLdbname'];
      $SQLuser = $config['SQLuser'];
      $SQLpass = $config['SQLpass'];

      if($SQLhost == '' || $SQLdbname == '' || $SQLuser=='') {
        header('Location: ./error.php?title=SQL%20Issue&content=No%20database%20specified%20in%20config%20file');
      }

    ?>
  </body>
</html>
