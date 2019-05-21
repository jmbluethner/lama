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
        while($row = $result->fetch_assoc()) {
          $serverip = $row['ip'];
          $serverport = $row['port'];
          $serverrcon = $row['rconpw'];
        }

        /*
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "../scq/queryUserdata.php?ip=".$serverip."&port=".$serverport);
        $result = curl_exec($curl);
        */
    ?>

    <div class="pane" id='pane_ServerDetail_<?php print_r($paneID) ?>'>
      <h3>[ @DIE-LAN ] Tournament #01</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_ServerDetail_<?php print_r($paneID) ?>')">
        <i class="fas fa-chevron-up" id="pane_ServerDetail_<?php print_r($paneID) ?>_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Server: <?php print_r($serverip) ?> | <?php print_r($serverport) ?></h4>
      <div class="mapimage"></div>
      <div class="servertiles_wrapper flexwrap_line_wrap">
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="fas fa-eye"></i></div>
            <div class="servertile_text">
              <span>6/10</span><br/>
              <span>Players</span>
            </div>
          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="fas fa-shield-alt"></i></div>
            <div class="servertile_text">
              <span>Enabled</span><br/>
              <span>VAC</span>
            </div>
          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="far fa-map"></i></div>
            <div class="servertile_text">
              <span>de_mirage</span><br/>
              <span>Map</span>
            </div>
          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">
            <div class="servertile_icon"><i class="far fa-flag"></i></div>
            <div class="servertile_text">
              <span>Defuse</span><br/>
              <span>Gamemode</span>
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
          <select class="select_line">
            <option></option>
            <!-- Hier kommt ein Loop hin, der alle .cfgs auf dem Server getted -->
            <!-- Lösung via page auf zielserver + curl von manage Server -->
            <option>server.cfg</option>
            <option>matchmaking.cfg</option>
            <option>kniferound.cfg</option>
          </select>
        </div>
      </div>
      <div class="occupy">
        <div class="flexwrap_line half manageline">
          <div class="description">
            Change Map
          </div>
          <input type="text" class="textinput select_line" placeholder="eg. de_dust2"></input>
        </div>
      </div>
      <br><br><br>
      <h4 style="margin-top: 35px;">LAMA Gameserver Console</h4>
      <div class="serverconsole">
        <span>LGC :></span><form><input type="text"></input></form>
      </div>
      <form method="get" action="servers.php">
        <input type="hidden" name="ipToRemove" value="<?php print_r($serverip) ?>" />
        <button type="submit" name="removeServer" class="button_warning">Remove Server from Database</button>
      </form>
    </div>


    <?php
      }
    ?>

    <div class="alertcontainer" id="alertcontainer" style="margin-top: 0 !important"></div>
    <?php
      // Add a Server to the 'gameservers' table in Database
      if(isset($_GET['addServer'])) {
        // Check if IP is pingable, than add to Database
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
