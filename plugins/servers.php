<!DOCTYPE html>
<html>
  <head>
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
        <input placeholder="Server Address" type="text" class="textinput"></input>
        <input placeholder="Port" type="text" class="textinput"></input>
        <input placeholder="Rcon Password" type="text" class="textinput"></input>
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

          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">

          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">

          </div>
        </div>
        <div class="servertile_border">
          <div class="servertile">

          </div>
        </div>
      </div>
      <button class="button_warning">Remove Server from Database</button>
    </div>

    <script src="../assets/js/functions.js"></script>
    <script src="https://cdn.nighttimedev.com/toolbox/js/generalFunctions.js"></script>
  </body>
</html>
