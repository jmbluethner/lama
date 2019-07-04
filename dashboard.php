<!DOCTYPE html>
<html>
  <head>
    <?php
      $config = include('config.php');
      $dispErrors = $config['errorReporting'];
      if($dispErrors == 1 || $dispErrors == 0) {

      } else {
        $dispErrors = 0;
      }
      ini_set('display_errors', $dispErrors);

      session_start();
      if($_SESSION['login'] != 'user') {
        header('Location: login.php');
        die();
      }
      if(!isset($_GET['viewframe'])) {
        $_GET['viewframe'] = 'home';
      }
    ?>
    <title>LAMA Server Manager</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="author" content="JΔMØ,NTD">
    <meta name="description" content="The advanced CS:GO Server Interface">
    <meta property="og:image" content="/assets/img/favicon.png">
    <meta property="og:description" content="The advanced CS:GO Server Interface">
    <meta property="og:title" content="LAN Server Manager">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="Lan, Intranet, DIE-LAN, Interface, Query, Source, CS:GO, Counter-Strike">
    <meta itemprop="copyrightHolder" content="Jamo">
    <meta itemprop="copyrightYear" content="2019">
    <meta itemprop="isFamilyFriendly" content="True">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="LAN Server Manager">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="orange">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="./favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/alert.css" type="text/css">
    <meta name="theme-color" content="#3b3b3b">
    <link rel="manifest" href="/manifest.json">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
  <body>
    <script src="./assets/js/functions.js"></script>
    <iframe src="./plugins/.shoutbox.php" class="frame_sbox"></iframe>
    <!-- ?php include "./plugins/.shoutbox.php" ? -->
    <section>
      <div class="topbar_container">
        <div class="topbar_wrapper">
          <a href="https://nighttimedev.com/projects/lama" target="_blank">
            <div class="topbar_logo">
              <button class="button_hidden">
                <h1>LA.MA</h1>
              </button>
            </div>
          </a>
          <div class="topbar_right">
            <div id="loader">
              <div class="loader"></div>
              <div class="loader"></div>
              <div class="loader"></div>
              <div class="loader"></div>
              <div class="loader"></div>
            </div>
            <script>showLoader()</script>
            <a onclick="configureUser()">
              <div class="topbar_username"><?php print_r($_SESSION['username']); ?></div>
            </a>
            <button class="topbar_back" title="One step back" onclick="goBack(); isFrameLoading();">
              <i class="fas fa-chevron-left"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="lower_container">
        <div class="sidebar_container">
          <div class="sidebar_wrapper">
            <div class="sidebar_plugincontainer">
              <?php
                $plugins = scandir('./plugins/');
                $plugins = array_diff($plugins, array('.', '..'));
                foreach ($plugins as $pluginSelected) {
                  if(!is_dir($pluginSelected)) {
                    // Check if plugin should be hidden
                    if($pluginSelected[0] != '.') {
                      if (strpos($pluginSelected, '.php') !== false) {
                        $pluginOriginal = preg_replace('/\\.[^.\\s]{3,4}$/', '', $pluginSelected);
                        $pluginSelected = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', $pluginSelected));
                        print_r("<button onclick='switchView(this); isFrameLoading(); tintPlugin(this.id)' class='sidebar_plugin' id='".$pluginOriginal."'>".$pluginSelected."</button>");
                      }
                    }
                  }
                }
              ?>
            </div>
            <a href="https://github.com/nighttimedev/manual-lama/blob/master/LAMA_Manual_GER.md" target="_blank">
              <button class="manual">
                Read the Manual
              </button>
            </a>
            <form method="GET" action="signOut.php">
              <button type="submit" class="sidebar_logout">
                <span>
                  Logout
                </span>
                <i class="fas fa-door-open"></i>
              </button>
            </form>
          </div>
        </div>
        <iframe id="contentframe" src=""></iframe>
      </div>
    </section>
    <div class="alertcontainer" id="alertcontainer"></div>
    <div class="lightbox" id="lbox">
      <div class="lightbox_inner">
        <a onclick="hideLightbox()"><i class="fas fa-window-close"></i></a>
        <form method="POST" action="changeUserdata.php">
          <h4>Change password</h4>
          <input autocomplete="off" type="password" name="newPw" class="textinput" placeholder="Password"></input><br>
          <input autocomplete="off" type="password" name="newPwConfirm" class="textinput" placeholder="Repeat Password"></input><br>
          <button type="submit" class="buttonLarge">Set new password</button>
          <h4>Change mail</h4>
          <input autocomplete="off" type="email" name="newMail" class="textinput" placeholder="Mail"></input><br>
          <input autocomplete="off" type="email" name="newMailConfirm" class="textinput" placeholder="Repeat Mail"></input><br>
          <button type="submit" class="buttonLarge">Set new mail address</button>
        </form>
      </div>
    </div>
    <?php
      // Changing the viewframe to the specified URL
      print_r("<script>switchViewID('".$_GET['viewframe']."')</script>")
    ?>
    <script>
      if(document.getElementById('contentframe').src == "") {
        document.getElementById('contentframe').src = "./plugins/home.php";
      }
    </script>
    <script>hideLoader()</script>
    <script src="./assets/js/colors.js"></script>
  </body>
</html>
