<!DOCTYPE html>
<html>
  <head>
    <?php include '../assets/php/sessioncheck.php' ?>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
    <script src="../assets/js/functions.js"></script>
  </head>
  <body class="framebody">

    <h1>Servers</h1>
    <span id="loadingstatus"></span>

    <div class="pane" id="pane_manageServers">
      <h3>Manage Servers</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_manageServers')">
        <i class="fas fa-chevron-up" id="pane_manageServers_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Add server</h4>
      <form method="get" action="servers.php">
        <div class="flexwrap_line">
          <input name="Sip" placeholder="Server Address" type="text" class="textinput split"></input>
          <input name="Sport" placeholder="Port" type="text" class="textinput split"></input>
          <input name="Srcon" placeholder="Rcon Password" type="text" class="textinput split"></input>
        </div>
        <button type="submit" name="addServer" class="buttonLarge">Add Server to Database</button>
      </form>
    </div>

    <?php

      require '../scq/SourceQuery/bootstrap.php';

      use xPaw\SourceQuery\SourceQuery;

      error_reporting(E_ERROR | E_PARSE);

      $config = include('../config.php');
      $SQLhost = $config['SQLhost'];
      $SQLdbname = $config['SQLdbname'];
      $SQLuser = $config['SQLuser'];
      $SQLpass = $config['SQLpass'];

      $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);

      $sql = "SELECT * FROM gameservers";
      $result = $conn->query($sql);

      $hits = $result->num_rows;


      // Loop thru all Rows and generate panes...

      for($lpc=0;$lpc<$hits;$lpc++) {
        $paneID = rand(0,99999999);

        // Get all Server Data

        $sql = "SELECT * FROM gameservers LIMIT 1 OFFSET $lpc--";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $serverip = $row['ip'];
        $serverport = $row['port'];
        $serverrcon = $row['rconpw'];

        $socket = @fsockopen("udp://".$serverip, $serverport , $errno, $errstr, 1);
        stream_set_timeout($socket, 1);
        stream_set_blocking($socket, TRUE);
        fwrite($socket, "\xFF\xFF\xFF\xFF\x54Source Engine Query\x00");
        $response = fread($socket, 4096);
        @fclose($socket);
        $packet = explode("\x00", substr($response, 6), 5);
        $server = array();
        $server['name'] = $packet[0];
        $server['map'] = $packet[1];
        $server['game'] = $packet[2];
        $server['description'] = $packet[3];
        $inner = $packet[4];
        $server['players'] = ord(substr($inner, 2, 1));
        $server['playersmax'] = ord(substr($inner, 3, 1));
        $server['password'] = ord(substr($inner, 7, 1));
        $server['vac'] = ord(substr($inner, 8, 1));

        Header( 'X-Content-Type-Options: nosniff' );

        // Edit this ->
        define( 'SQ_SERVER_ADDR', $serverip );
        define( 'SQ_SERVER_PORT', $serverport );
        define( 'SQ_TIMEOUT',     1 );
        define( 'SQ_ENGINE',      SourceQuery::SOURCE );
        // Edit this <-

        $Query = new SourceQuery( );


    ?>

    <div class="pane" id='pane_ServerDetail_<?php print_r($paneID) ?>'>
      <h3><div class="badge_large"><?php echo $server['game'] ?></div><span><?php print_r($server['name']); ?></span></h3>
      <button class="pane_collapse" onclick="collapsePane('pane_ServerDetail_<?php print_r($paneID) ?>')">
        <i class="fas fa-chevron-up" id="pane_ServerDetail_<?php print_r($paneID) ?>_chevron"></i>
      </button>
      <script>collapsePane('pane_ServerDetail_<?php print_r($paneID) ?>')</script>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Server: <?php print_r($serverip) ?> | <?php print_r($serverport) ?> - Description: <?php echo $server['description'] ?></h4>

      <!--
        This Element gets displayed below the IP when there is no RCON password supplied
      -->
      <?php
        if(empty($serverrcon)) {
          print_r('<div class="rcon_badge"><i class="fas fa-exclamation-triangle"> </i> No RCON provided</div>');
        }
      ?>

      <div class="mapimage" id="mp<?php print_r($lpc); ?>">Map Image not available</div>
      <script type="text/javascript">
        var el = document.getElementById("mp<?php print_r($lpc); ?>");
        <?php
          $mapimage = $config['imageDB'].$server['map'].".jpg";
        ?>

        <?php
          // Check if Map-Image exists on Server. If it doesn't exist, don't apply the background-image

          $url = $mapimage;
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_NOBODY, true);
          $result = curl_exec($curl);
          if ($result !== false) {
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($statusCode == 404) {
            // dead

            } else {
            // alive
              ?>
              el.style.backgroundImage = "url('<?php print_r($mapimage); ?>')";
              <?php
            }
          }
          else {
            // dead

          }
        ?>

        // HERE
        var currentBg = document.getElementById('mp<?php print_r($lpc); ?>').style.backgroundImage;

        if(document.getElementById('mp<?php print_r($lpc); ?>').style.backgroundImage.length != 0) {
          el.textContent = "";
        } else {
          el.textContent = "Map Image not available";
        }
      </script>
      <div class="servertiles_wrapper flexwrap_line_wrap">
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="fas fa-eye"></i></div>
            <div class="servertile_text">
              <span><?php print_r($server['players']); ?> / <?php print_r($server['playersmax']); ?></span><br/>
              <span>Players</span>
            </div>
          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="fas fa-shield-alt"></i></div>
            <div class="servertile_text">
              <span><?php if ($server['vac'] == 1) { print_r('true');} else {print_r('false');} ?></span><br/>
              <span>VAC</span>
            </div>
          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="far fa-map"></i></div>
            <div class="servertile_text">
              <span><?php print_r($server['map']); ?></span><br/>
              <span>Map</span>
            </div>
          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="far fa-flag"></i></div>
            <div class="servertile_text">
              <span><?php print_r($server['game']); ?></span><br/>
              <span>Mode</span>
            </div>
          </div>
        </div>
      </div>
      <h4 style="margin-top: 35px;">Direct Gameserver Control</h4>
      <div class="occupy">
        <div class="flexwrap_line half manageline">
          <div class="description">
            Exec Config
          </div>
          <form action="./support/multircon.php" method="POST" style="flex-grow: 100; display: flex;">
            <select class="select_line" name="confSelect">
              <?php
                $configs = scandir('../assets/serverconfigs/');
                $configs = array_diff($configs, array('.', '..'));
                foreach ($configs as $configSelected) {
                  if(!is_dir($configSelected)) {
                    // Check if plugin should be hidden
                    if($configSelected[0] != '.') {
                      if (strpos($configSelected, '.cfg') !== false) {
                        $configOriginal = preg_replace('/\\.[^.\\s]{3,4}$/', '', $configSelected);
                        $configSelected = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', $configSelected));
                        $configSelectedQuote = '"'.$configSelected.'"';

                        print_r("<option>".$configSelected."</option>");
                      }
                    }
                  }
                }
              ?>
            </select>
            <button type="submit" style="margin-left: 10px; height: 36px;" class="button_simple">Exec!</button>
          </form>
        </div>
      </div>
      <!--
      <div class="occupy">
        <div class="flexwrap_line half manageline">
          <div class="description">
            Change Map
          </div>
          <form method="GET" action="../assets/php/rcon.php">
            <input type="text" name="servercommand" class="textinput select_line" placeholder="eg. de_dust2"></input>
            <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
            <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
            <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
          </form>
        </div>
      </div>
      -->
      <br><br>
      <form method="GET" action="../assets/php/rcon.php">
        <button type="submit" class="buttonLarge">Pause Match</button>
        <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
        <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
        <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
        <input type="hidden" name="servercommand" value="mp_pause_match"></input>
      </form>
      <form method="GET" action="../assets/php/rcon.php">
        <button type="submit" class="buttonLarge">Unpause Match</button>
        <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
        <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
        <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
        <input type="hidden" name="servercommand" value="mp_unpause_match"></input>
      </form>
      <form method="GET" action="../assets/php/rcon.php">
        <button type="submit" class="buttonLarge">Start Warmup</button>
        <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
        <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
        <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
        <input type="hidden" name="servercommand" value="mp_warmup_start"></input>
      </form>
      <form method="GET" action="../assets/php/rcon.php">
        <button type="submit" class="buttonLarge">End Warmup</button>
        <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
        <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
        <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
        <input type="hidden" name="servercommand" value="mp_warmup_end"></input>
      </form>
      <!-- Implement! -->
      <button class="buttonLarge">Kick all Players</button>
      <br><br>
      <h4 style="margin-top: 35px;">LAMA Gameserver Console</h4>
      <div class="serverconsole">
        <span>LGC :></span>
        <form method="GET" action="../assets/php/rcon.php">
          <input type="text" name="servercommand"></input>
          <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
          <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
          <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
        </form>
      </div>
      <form method="get" action="servers.php">
        <input type="hidden" name="ipToRemove" value="<?php print_r($serverip) ?>" />
        <button type="submit" name="removeServer" class="button_warning">Remove Server from Database</button>
      </form>
      <?php
        //$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

        //$players = $Query->GetPlayers( );


        try
      	{
      		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

      		$players = $Query->GetPlayers( );

      	}
      	catch( Exception $e )
      	{
      		echo $e->getMessage( );
      	}
      	finally
      	{
      		$Query->Disconnect( );
      	}
      ?>
      <br>
      <h4>Players</h4>
      <table class="table_condensed">
        <thead>
          <tr>
            <th><?php echo implode('</th><th>', array_keys(current($players))); ?></th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($players as $row): array_map('htmlentities', $row); ?>
          <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
            <td>
              <form method="GET" action="../assets/php/rcon.php">
                <button type="submit" class="button_warning button_warning_small">BAN</button>
                <input type="hidden" name="serverip" value="<?php print_r($serverip) ?>"></input>
                <input type="hidden" name="serverrcon" value="<?php print_r($serverrcon) ?>"></input>
                <input type="hidden" name="serverport" value="<?php print_r($serverport) ?>"></input>
                <input type="hidden" name="servercommand" value="banid 0 <?php echo $row['Id'] ?> kick"></input>
              </form>
            </td>
          </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <?php
      }
    ?>

    <div class="alertcontainer" id="alertcontainer" style="margin-top: 0 !important"></div>
    <?php
      // Add a Server to the 'gameservers' table in Database
      if(isset($_GET['addServer'])) {
        // Check if IP is pingable, than add to Database
        if($_GET['Sip'] != "" && $_GET['Sport'] != "") {

          $doPing = $config['serverping'];
          if($doPing == 1) {
            print_r('<script>showStatus("Checking if provided Host + Port is reachable...")</script>');

            set_time_limit(0);
            $fp = fsockopen($_GET['Sip'], $_GET['Sport'], $errno, $errstr, 300);
            if(! $fp)
            {
              print_r('<script>showStatus("Host not reachable! Check IP and Port. Than try again.")</script>');
              die();
            }
            else
            {
              print_r('<script>showStatus("Host successfully pinged!")</script>');
            }
          }

          print_r('<script>showStatus("Adding Server to Database ...")</script>');

          $insertIP = $_GET['Sip'];
          $insertPort = $_GET['Sport'];
          $insertRcon = $_GET['Srcon'];

          // Check if Server already in DB

          $sql = "SELECT * FROM gameservers WHERE ip='$insertIP'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            print_r('<script>showStatus("Server already registered in Database. Skipping request...")</script>');
            die();
          }

          $sql = "INSERT INTO gameservers (ip,port,rconpw) VALUES ('$insertIP','$insertPort','$insertRcon')";
          $result = $conn->query($sql);
          print_r('<script>showStatus("Successfully added Server to Database!<br>Refresh the servers Plugin by clicking on it in the left menu.")</script>');
        } else {
          print_r('<script>showStatus("IP and Port must be provided!")</script>');
        }

      }

      // Remove a Server from the Database
      if(isset($_GET['removeServer'])) {
        print_r('<script>showStatus("Getting IP of the Server which has to get removed ..")</script>');
        $serveripRemove = $_GET['ipToRemove'];
        print_r('<script>showStatus("Deleting entry from Database ...")</script>');
        $sql = "DELETE FROM gameservers WHERE ip='$serveripRemove'";
        $result = $conn->query($sql);
        print_r('<script>showStatus("Successfully removed Server from Database!<br>Refresh the servers Plugin by clicking on it in the left menu.")</script>');
      }
    ?>
  </body>
</html>
