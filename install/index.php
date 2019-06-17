<html>
  <head>
    <title>LAMA Server Manager - INSTALL</title>
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
    <link rel="stylesheet" href="./install.css" type="text/css">
    <meta name="theme-color" content="#be0000">
    <link rel="manifest" href="/manifest.json">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
  </head>
  <body>
    <script type="text/javascript">
      function installFailed() {
        document.getElementById("headbar").style.backgroundColor = "rgb(190,0,0)";
        document.getElementById("gear1").style.display = "none";
        document.getElementById("gear2").style.display = "none";
        document.getElementById("triangle").style.display = "block";
      }
    </script>
    <div class="box">
      <div class="box_head" id="headbar">
        <h1>Installation</h1>
        <div class="gears">
          <i class="fas fa-exclamation-triangle" id="triangle"></i>
          <i id="gear1" class="fas fa-cog"></i>
          <i id="gear2" class="fas fa-cog"></i>
        </div>
      </div>
      <div class="box_content">
        <?php
          if (ob_get_level() == 0) ob_start();

          print_r('The installer will take care of all that has to be done<br>');
          ob_flush();
          flush();
          sleep(2);
          print_r('Connecting to the Database ...<br>');
          ob_flush();
          flush();
          sleep(1);
          // Connect to SQL

          $config = include('../config.php');
          $SQLhost = $config['SQLhost'];
          $SQLdbname = $config['SQLdbname'];
          $SQLuser = $config['SQLuser'];
          $SQLpass = $config['SQLpass'];

          $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);
          if ($conn->connect_error) {
            print_r('<script>installFailed()</script>');
            die('<span style="color: rgb(190,0,0)">Connecting to the SQL database failed: ' . $conn->connect_error . '</span>');
          }
          print_r('A connection to the Database was sucessfully established! Yeeeey<br>');
          print_r('I will now set up all needed tables ...<br>');
          ob_flush();
          flush();
          sleep(1);
          print_r('The first table to set up is <i>users</i><br>');
          ob_flush();
          flush();

          $val = $conn->query('select 1 from `users` LIMIT 1');

          if($val !== FALSE) {
             print_r('<i>users</i> already exists. Skipping.<br>');
          } else {
            $sql = "CREATE TABLE users (
              username LONGTEXT,
              password LONGTEXT,
              role TEXT,
              mail LONGTEXT,
              id int(11)
            )";

            if ($conn->query($sql) === TRUE) {
              echo "Table <i>users</i> created successfully<br>";
            } else {
              print_r('<script>installFailed()</script>');
              die("Error creating table: " . $conn->error);
            }
          }

          // Here we need to generate all other tables. The System from above works fine.

          print_r('All tasks are done! I will now close the Connection and link you to the login.');
          ob_flush();
          flush();
          sleep(5);
          $conn->close();
          ob_end_flush();
          header("Location: ../index.php");
          die();
        ?>
      </div>
    </div>
  </body>
</html>
