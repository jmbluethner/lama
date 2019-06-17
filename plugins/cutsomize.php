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
    <h1>Customizing</h1>
    <div class="pane" id="pane_changeTheme">
      <h3>Change Design and Layout</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_changeTheme')">
        <i class="fas fa-chevron-up" id="pane_changeTheme_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <?php

        // Hier müssen die Sets aus der SQL DB gezogen werden

        $colors = ['primary','secondary','tertiary','active','accent','critical','message','warning','text','text_light','textSecondary','panes','table_light','table_dark'];

        // <h4>Name</h4>

        for($i=0;$i<sizeof($colors);$i++) {

        }

        print_r('<div class="colorset_elem" style="background-color:'.$colorcode.'"></div>');

        print_r('</div>');

      ?>
    </div>
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
