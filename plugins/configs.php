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
    <script src="../assets/js/colors.js"></script>
    <h1>Manage Server Configs</h1>
    <div class="pane" id="pane_seeConfigs">
      <!-- Configs have to come from /assets/serverconfigs -->
      <h3>All available configs</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_seeConfigs')">
        <i class="fas fa-chevron-up" id="pane_seeConfigs_chevron"></i>
      </button>
      <table class="table_condensed">
        <?php
          // Get all Config files
          $configs = scandir('../assets/serverconfigs/');
          $configs = array_diff($configs, array('.', '..'));
          foreach ($configs as $configSelected) {
            if(!is_dir($configSelected)) {
              // Check if plugin should be hidden
              if($configSelected[0] != '.') {
                if (strpos($configSelected, '.cfg') !== false) {
                  $configOriginal = preg_replace('/\\.[^.\\s]{3,4}$/', '', $configSelected);
                  $configSelected = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', $configSelected));
                  print_r("<tr><td>".$configSelected."</td></tr>");
                }
              }
            }
          }
        ?>
      </table>
    </div>
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
