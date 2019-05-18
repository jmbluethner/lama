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
    <div class="pane" id="pane_allBans">
      <h3>All Bans</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_allBans')">
        <i class="fas fa-chevron-up" id="pane_allBans_chevron"></i>
      </button>
      <!-- <table class="table_massentry">
        <tr>
          <td><span class="username">Username123</span></td>
          <td><span class="chattext">This Server is so freaking awesome!</span></td>
        </tr>
      </table> -->
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
    <script src="../assets/js/functions.js"></script>
    <script src="https://cdn.nighttimedev.com/toolbox/js/generalFunctions.js"></script>
  </body>
</html>
