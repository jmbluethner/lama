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

    <h1>Users</h1>
    <span id="loadingstatus"></span>

    <div class="pane" id="pane_addUsers">
      <h3>Manage Users</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_addUsers')">
        <i class="fas fa-chevron-up" id="pane_addUsers_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <h4>Add User</h4>

    </div>
  </body>
</html>
