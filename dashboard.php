<!--
        This file is the First Page a logged-in user will see.
        Here you can see all Servers which where transmitted to the database.
 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./web-elements/php/head.php" ?>
  <link rel="stylesheet" href="./web-elements/css/main.css" />
</head>

<body>
  <nav>
    <h1>CSGO Manager</h1>
  </nav>
  <section class="mainframe">
    <div class="serverindex">
      <div class="servertile">
        <div class="content_upper">
          <h2>Servername</h2>
          <h6>[ID: 0001]</h6>
          <table class="servertable">
            <tr>
              <th>Vac</th>
              <th>Value</th>
            </tr>
            <tr>
              <th>Mode</th>
              <th>Value</th>
            </tr>
            <tr>
              <th>Slots</th>
              <th>Value</th>
            </tr>
          </table>
        </div>
        <div class="content_lower">
          <button class="manage_server">Manage</button>
        </div>
      </div>
    </div>
    <div class="controlbuttons">
      <div class="controlbuttons_inner">
        <button class="controllbutton">Server anlegen</button>
        <button class="controllbutton">Bestehenden hinzufügen</button>
      </div>
    </div>
  </section>
  <script src=""></script>
</body>

</html>
