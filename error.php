<html>
  <head>
    <title>LAMA Manager - An Error occured</title>
    <link rel="stylesheet" href="./assets/css/error.css">
  </head>
  <body>
    <div class="box">
      <div class="box_head" id="headbar">
        <h1>Error: <?php print_r($_GET['title']) ?></h1>
        <div class="gears">
          <i class="fas fa-exclamation-triangle" id="triangle"></i>
        </div>
      </div>
      <div class="box_content">
        <?php print_r($_GET['content']) ?>
      </div>
    </div>
  </body>
</html>
