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
    <script type="text/javascript">
      function installFailed() {
        document.getElementById("headbar").style.backgroundColor = "rgb(190,0,0)";
        document.getElementById("gear1").style.display = "none";
        document.getElementById("gear2").style.display = "none";
        document.getElementById("triangle").style.display = "block";
      }
      function installDone() {
        document.getElementById("headbar").style.backgroundColor = "rgb(0,200,0)";
        document.getElementById("gear1").style.display = "none";
        document.getElementById("gear2").style.display = "none";
        document.getElementById("hook").style.display = "block";
      }
    </script>
  </head>
  <body>
    <?php
      include "../assets/php/write-to-log.php";
      writeToLog('../config.php','../lama.log','Install triggered');
    ?>
    <div class="box">
      <div class="box_head" id="headbar">
        <h1>Installation</h1>
        <div class="gears">
          <i id="hook" class="fas fa-check"></i>
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

          // Set up a table

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
              // Check if default user already exists. If not - create!
              $sql = "SELECT username FROM users WHERE username='root'";
              $result = $conn->query($sql);
              if ($result->num_rows == 0) {
                // No root user found
                $sql = "INSERT INTO users (username,password,role,mail) VALUES ('root','69ac3e4378b921df85493a8ca63eec322b42b058112b8aa118e2e12ac1f6441926e77bd8d0dbb2d937c2764b4b5117425f6f24c9ed649200121860418ffebd27','root','root@root.root')";
                if ($conn->query($sql) === TRUE) {
                  print_r('Created default user.<br>');
                } else {
                  print_r('<script>installFailed()</script>');
                  die("Error creating default user: " . $conn->error);
                }
              } else {
                print_r('The default user already exists. Skipped.<br>');
              }
              echo "Table <i>users</i> created successfully<br>";
            } else {
              print_r('<script>installFailed()</script>');
              die("Error creating table: " . $conn->error);
            }
          }

          // Set up a table

          print_r('Now I set up <i>themes</i><br>');
          ob_flush();
          flush();

          $val = $conn->query('select 1 from `themes` LIMIT 1');

          if($val !== FALSE) {
             print_r('<i>themes</i> already exists. Skipping.<br>');
          } else {
            $sql = "CREATE TABLE themes (
              themename TINYTEXT,
              primaryColor TINYTEXT,
              secondary TINYTEXT,
              tertiary TINYTEXT,
              active TINYTEXT,
              accent TINYTEXT,
              critical TINYTEXT,
              message TINYTEXT,
              warning TINYTEXT,
              text TINYTEXT,
              text_light TINYTEXT,
              textSecondary TINYTEXT,
              panes TINYTEXT,
              table_light TINYTEXT,
              table_dark TINYTEXT
            )";

            if ($conn->query($sql) === TRUE) {
              print_r('I will now insert the default values into <i>themes</i> ...<br>');
              ob_flush();
              flush();
              $sql = "INSERT INTO themes (themename,primaryColor,secondary,tertiary,active,accent,critical,message,warning,text,text_light,textSecondary,panes,table_light,table_dark) VALUES ('Futuretech','#E8EBEE','#2B333E','#333D4A','#151515','#00B2FF','rgb(190, 0, 0)','#00B2FF','rgb(250, 165, 0)','#000000','#5E5E5E','#ffffff','#ffffff','#F2F2F2','#EAEAEA')";
              if ($conn->query($sql) === TRUE) {
                echo "Table <i>themes</i> created successfully<br>";
              } else {
                print_r('<script>installFailed()</script>');
                die("Error creating table: " . $conn->error);
              }
            } else {
              print_r('<script>installFailed()</script>');
              die("Error creating table: " . $conn->error);
            }
          }

          // Set up a table

          print_r('Now I set up <i>gameservers</i><br>');
          ob_flush();
          flush();

          $val = $conn->query('select 1 from `gameservers` LIMIT 1');

          if($val !== FALSE) {
             print_r('<i>gameservers</i> already exists. Skipping.<br>');
          } else {
            $sql = "CREATE TABLE gameservers (
              ip TEXT,
              port int(11),
              rconpw TEXT,
              mail LONGTEXT,
              id int(5) AUTO_INCREMENT,
              PRIMARY KEY (id)
            )";

            if ($conn->query($sql) === TRUE) {
              echo "Table <i>gameservers</i> created successfully<br>";
            } else {
              print_r('<script>installFailed()</script>');
              die("Error creating table: " . $conn->error);
            }
          }

          // Set up a table

          print_r('Now I set up <i>Shoutbox</i><br>');
          ob_flush();
          flush();

          $val = $conn->query('select 1 from `shoutbox` LIMIT 1');

          if($val !== FALSE) {
             print_r('<i>shoutbox</i> already exists. Skipping.<br>');
          } else {
            $sql = "CREATE TABLE shoutbox (
              id int(11) not null AUTO_INCREMENT primary key,
              username TEXT not null,
              message TEXT not null
            )";

            if ($conn->query($sql) === TRUE) {
              echo "Table <i>shoutbox</i> created successfully<br>";
            } else {
              print_r('<script>installFailed()</script>');
              die("Error creating table: " . $conn->error);
            }
          }

          print_r('The last thing I have to do is to create the lama.log file<br>');
          ob_flush();
          flush();
          sleep(1);

          // Check if log file already exists. If not - create
          $filename = '../lama.log';
          if(!file_exists($filename)) {
            $config = include('../config.php');
            date_default_timezone_set($config['timezone']);
            $time = date("Y-m-d H:i:s");
            $handle = fopen($filename, 'w') or die('Cannot open the file!<br><script>installFailed()</script>');
            fclose($handle);
            $content = '['.$time.'] log file created from /install, executed by IP: '.$_SERVER["REMOTE_ADDR"].PHP_EOL;
            file_put_contents($filename,$content);
            print_r('Log file successfully created!<br>');
          } else {
            print_r('Log file already exists. Skipping.<br>');
          }

          print_r('<script>installDone()</script>');
          print_r('All tasks are done! I will now close the Connection to the DB. You can go to the login page and log in.<br><b>Have fun managing your servers! GL & HF</b>');
          ob_flush();
          flush();
          $conn->close();
          ob_end_flush();
        ?>
      </div>
    </div>
  </body>
</html>
