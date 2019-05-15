<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
  </head>
  <body>
    <h1>Home</h1>
    <div class="pane">
      <h2>Welcome Username!</h2>
      <p class="contenttext">There are currently 4 Servers with a total of 13 Players</p>
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
          <th>Maps</th>
          <th>Status</th>
        </tr>
      </table>
    </div>
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
