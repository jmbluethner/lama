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
      <h4>HaXx0r</h4>
      <?php
      /*
        function createColorset(primary,secondary,tertiary,active,accent,critical,message,warning,text,text_light,textSecondary,panes,table_light,table_dark) {
          $args = func_num_args();

          print_r('
            <button class="colorset_cont" onclick="changeTheme('.$primary.','.$secondary.','.$tertiary.','.$active.','.$accent.','.$critical.','.$message.','.$warning.','.$text.','.$text_light.','.$textSecondary.','.$panes.','.$table_light.','.$table_dark.')">
              <div class="colorset_elem" style="background-color: '.$primary.'"></div>
              <div class="colorset_elem" style="background-color: '.$secondary.'"></div>
              <div class="colorset_elem" style="background-color: '.$tertiary.'"></div>
              <div class="colorset_elem" style="background-color: '.$active.'"></div>
              <div class="colorset_elem" style="background-color: '.$accent.'"></div>
              <div class="colorset_elem" style="background-color: '.$critical.'"></div>
              <div class="colorset_elem" style="background-color: '.$message.'"></div>
              <div class="colorset_elem" style="background-color: '.$warning.'"></div>
              <div class="colorset_elem" style="background-color: '.$text.'"></div>
              <div class="colorset_elem" style="background-color: '.$text_light.'"></div>
              <div class="colorset_elem" style="background-color: '.$textSecondary.'"></div>
              <div class="colorset_elem" style="background-color: '.$panes.'"></div>
              <div class="colorset_elem" style="background-color: '.$table_light.'"></div>
              <div class="colorset_elem" style="background-color: '.$table_dark.'"></div>
            </button>
          ')
        }
      */
      ?>
    </div>
    <script src="../assets/js/functions.js"></script>
  </body>
</html>
