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
    <h1>Versions & Update</h1>
    <div class="pane" id="pane_switchVersion">
      <h3>Switch to another Version</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_switchVersion')">
        <i class="fas fa-chevron-up" id="pane_switchVersion_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
    </div>
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
