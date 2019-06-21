<!DOCTYPE html>
<html>
  <head>
    <?php include '../assets/php/sessioncheck.php' ?>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../assets/js/functions.js"></script>
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
      <table class="table_condensed_reg table_condensed">
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
                  $configSelectedQuote = '"'.$configSelected.'"';

                  print_r("<tr><td>".$configSelected."</td></tr>");
                }
              }
            }
          }
        ?>
      </table>
      <br>
      <form class="multiform" method="POST" action="./support/createConf.php">
        <input class="textinput" style="max-width: 296px;" type="text" name="configname" placeholder="Example: newConfig">
        <button type="submit" class="buttonLarge">Create new</button>
      </form>
      <form class="multiform" method="POST" action="./support/delConf.php">
        <input class="textinput" style="max-width: 296px;" type="text" name="configname" placeholder="Example: killThis">
        <button type="submit" class="button_warning">Delete existing</button>
      </form>
    </div>

    <?php
      $i = 0;
      foreach ($configs as $configSelected) {
        if(!is_dir($configSelected)) {
          // Check if plugin should be hidden
          if($configSelected[0] != '.') {
            if (strpos($configSelected, '.cfg') !== false) {
              $configOriginal = preg_replace('/\\.[^.\\s]{3,4}$/', '', $configSelected);
              $configSelected = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', $configSelected));
              $configContent = file_get_contents('../assets/serverconfigs/'.$configSelected.".cfg");

    ?>

    <div class="pane" id="pane_configIDE<?php print_r($i) ?>">
      <!-- Configs have to come from /assets/serverconfigs -->
      <h3>Config: <i><?php print_r($configSelected) ?></i></h3>
      <button class="pane_collapse" onclick="collapsePane('pane_configIDE<?php print_r($i) ?>')">
        <i class="fas fa-chevron-up" id="pane_configIDE<?php print_r($i) ?>_chevron"></i>
      </button>
      <script>collapsePane('pane_configIDE<?php print_r($i) ?>')</script>
      <form method="POST" action="./support/changeConfig.php">
<textarea name="configContent" rows=10 id="configIDE">
<?php print_r($configContent); ?>
</textarea>
        <input type="hidden" name="configName" value="<?php print_r($configSelected) ?>">
        <button type="submit" class="buttonLarge">Save changes</button>
      </form>
    </div>

    <?php
              $i++;
            }
          }
        }
      }
    ?>

    <script>
      /*
      var dates = $('*[id^="configIDE"]');

      for(var i=0;i!=dates.length;i++) {
        document.getElementById(dates[i].id);
      }
      */
    </script>
  </body>
</html>
