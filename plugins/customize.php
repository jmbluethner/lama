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

        $themeArray = ['themename','primaryColor','secondary','tertiary','active','accent','critical','message','warning','text','text_light','textSecondary','panes','table_light','table_dark'];

        // Pull all sets from SQL

        $config = include('../config.php');
        $SQLhost = $config['SQLhost'];
        $SQLdbname = $config['SQLdbname'];
        $SQLuser = $config['SQLuser'];
        $SQLpass = $config['SQLpass'];
        $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);
        $sql = "SELECT * FROM themes";
        $result = $conn->query($sql);
        $hits = $result->num_rows;

        for($lpc=0;$lpc<$hits;$lpc++) {
          $sql = "SELECT * FROM themes LIMIT 1 OFFSET $lpc--";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();

          $prefix = $colors = '';
          foreach ($row as $color) {
              $colors .= $prefix . '"' . $color . '"';
              $prefix = ', ';
          }

          print_r('<h4>'.$row['themename'].'</h4>');
          print_r("<a class='colorset_block' onclick='changeTheme(".$colors.")'><div class='colorset_cont'>");
          for($i=1;$i<sizeof($row);$i++) {
            print_r('<div class="colorset_elem" style="background-color:'.$row[$themeArray[$i]].'"></div>');
          }
          print_r('</div></a>');
        }

      ?>
    </div>
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
