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
    <h1>Servers</h1>

    <div class="pane" id="pane_manageServers">
      <h3>Manage Servers</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_manageServers')">
        <i class="fas fa-chevron-up" id="pane_manageServers_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Add server</h4>
      <div class="flexwrap_line">
        <input placeholder="Server Address" type="text" class="textinput split"></input>
        <input placeholder="Port" type="text" class="textinput split"></input>
        <input placeholder="Rcon Password" type="text" class="textinput split"></input>
      </div>
      <button class="buttonLarge">Add Server to Database</button>
    </div>

    <div class="pane" id="pane_ServerDetail_1">
      <h3>[ @DIE-LAN ] Tournament #01</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_ServerDetail_1')">
        <i class="fas fa-chevron-up" id="pane_ServerDetail_1_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Add server</h4>
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
      <button class="button_warning">Remove Server from Database</button>
    </div>

    <script src="../assets/js/functions.js"></script>
  </body>
</html>
