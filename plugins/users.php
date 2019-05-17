<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
  </head>
  <body class="framebody">
    <h1>Users</h1>
    <div class="pane" id="pane_manageUsers">
      <h3>Manage Users</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_manageUsers')">
        <i class="fas fa-chevron-up" id="pane_manageUsers_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Search users</h4>
      <input placeholder="Steam ID" type="text" class="textinput"></input>
      <input placeholder="Username" type="text" class="textinput"></input>
      <div class="wrapblock">
        <input placeholder="Register Date" type="text" class="textinput half"></input>
        <select class="half">
          <option></option>
          <option>Banned</option>
          <option>Unbanned</option>
        </select>
      </div>
      <button class="buttonLarge">Apply filter</button>
    </div>
    <div class="pane" id="pane_allUsers">
      <h3>All Users ever recorded</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_allUsers')">
        <i class="fas fa-chevron-up" id="pane_allUsers_chevron"></i>
      </button>
    </div>
    <script src="../assets/js/functions.js"></script>
    <script src="https://cdn.nighttimedev.com/toolbox/js/generalFunctions.js"></script>
  </body>
</html>
