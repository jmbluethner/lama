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

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">

     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
  <body>
    <section class="login__mainsection bg__cover">
      <div class="login__frame">
        <div class="login__logo"></div>

        <!-- LOGIN -->

        <form action="/assets/php/required/checkLogin.php" class="login__form" method="post">
          <input type="email" placeholder="E-Mail" name="loginMail" />
          <input type="password" placeholder="Passwort" name="loginPassword" />
          <button type="submit" name="requestLogin">Login</button>
        </form>

        <span class="login__hinttext">
          <a onclick="toggleLightbox('createAccount')">Noch kein Account? Dann leg dir einen an!</a>
        </span>
        <span class="login__hinttext">
          <a onclick="toggleLightbox('forgotPassword')">Passwort vergessen?</a>
        </span>
      </div>
    </section>

    <!-- Register -->

    <div class="lightbox__container" id="createAccount">
      <div class="lightbox__box">
        <div class="lightbox__topbar">
          <span class="lightbox__topbar_title">
            Account erstellen
          </span>
          <span class="lightbox__topbar_close">
            <button onclick="toggleLightbox('createAccount')">X</button>
          </span>
        </div>
        <form class="lightbox__form" method="post" action="./assets/php/required/createAccount.php">
          <input name="registerFirstName" type="text" placeholder="Vorname" class="lightbox__input__text"/>
          <input name="registerSurname" type="text" placeholder="Nachname" class="lightbox__input__text"/>
          <input name="registerMail" type="email" placeholder="E-Mail" class="lightbox__input__text"/>
          <input name="registerPass" type="password" placeholder="Passwort" class="lightbox__input__text"/>
          <input name="registerPassRepeat" type="password" placeholder="Passwort wiederholen" class="lightbox__input__text"/>
          <button type="submit" name="registerSubmit">Registrieren</button>
        </form>
      </div>
    </div>

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
    <script src="/assets/js/lightbox.js"></script>
  </body>
</html>
