<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
  </head>
  <body class="framebody">
    <h1>Bans</h1>
    <div class="pane" id="pane_manageBans">
      <h3>Manage Bans</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_manageBans')">
        <i class="fas fa-chevron-up" id="pane_manageBans_chevron"></i>
      </button>
      <div class="flexwrap_2col">
        <div class="flexblock_2col">
          <h4>Add Ban</h4>
          <input placeholder="Steam ID" type="text" class="textinput"></input>
          <input placeholder="Reason" type="text" class="textinput"></input>
          <div class="flexwrap_line">
            <input placeholder="Duration" type="text" class="textinputDetails"></input>
            <div class="detailTag">hours</div>
          </div>
          <button class="buttonLarge">Swing the ban hammer</button>
        </div>
        <div class="flexblock_2col">
          <h4>Seach Bans</h4>
          <input placeholder="Steam ID" type="text" class="textinput half"></input>
          <input placeholder="Username" type="text" class="textinput half"></input>
          <input placeholder="Reason" type="text" class="textinput"></input>
          <div class="flexwrap_line">
            <input placeholder="Duration" type="text" class="textinputDetails"></input>
            <div class="detailTag">hours</div>
          </div>
          <button class="buttonLarge">Seach Ban Database</button>
        </div>
      </div>
    </div>
    <script src="../assets/js/functions.js"></script>
    <script src="https://cdn.nighttimedev.com/toolbox/js/generalFunctions.js"></script>
  </body>
</html>
