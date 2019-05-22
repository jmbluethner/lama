<!DOCTYPE html>
<html>
  <head>
    <?php include '../assets/php/sessioncheck.php' ?>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
  </head>
  <body class="framebody">
    <h1>Home</h1>
    <div class="pane">
      <h2>Welcome <?php print_r($_SESSION['username']) ?></h2>
    </div>
    <div class="pane" id="pane_servers">
      <h3>Servers</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_servers')">
        <i class="fas fa-chevron-up" id="pane_servers_chevron"></i>
      </button>

      <table class="table_condensed">
        <tr>
          <th>Name</th>
          <th>Slots</th>
          <th>Mode</th>
          <th>Map</th>
        </tr>
        <?php

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
        ?>
        <tr>
          <td><?php print_r($server['name']); ?></td>
          <td><?php print_r($server['players']." / ".$server['playersmax']); ?></td>
          <td><?php print_r($server['game']); ?></td>
          <td><?php print_r($server['map']); ?></td>
        </tr>
        <?php
          }
        ?>
      </table>
    </div>
    <!--
    <div class="pane" id="pane_recentActions">
      <h3>Recent Actions</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_recentActions')">
        <i class="fas fa-chevron-up" id="pane_recentActions_chevron"></i>
      </button>
      <table class="twocol_table">
        <tr>
          <td>Username banned 2nd Username because of bug abuse<p class="timeChanged">10 Minutes ago</p></td>
          <td><button class="button_simple">revert</button></td>
        </tr>
        <tr>
          <td>Username banned 2nd Username because of bug abuse<p class="timeChanged">10 Minutes ago</p></td>
          <td><button class="button_simple">revert</button></td>
        </tr>
        <tr>
          <td>Username banned 2nd Username because of bug abuse<p class="timeChanged">10 Minutes ago</p></td>
          <td><button class="button_simple">revert</button></td>
        </tr>
        <tr>
          <td>Username banned 2nd Username because of bug abuse<p class="timeChanged">10 Minutes ago</p></td>
          <td><button class="button_simple">revert</button></td>
        </tr>
        <tr>
          <td>Username banned 2nd Username because of bug abuse<p class="timeChanged">10 Minutes ago</p></td>
          <td><button class="button_simple">revert</button></td>
        </tr>
        <tr>
          <td>Username banned 2nd Username because of bug abuse<p class="timeChanged">10 Minutes ago</p></td>
          <td><button class="button_simple">revert</button></td>
        </tr>
      </table>
    </div>
    -->
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
