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
  <?php
    if($_SESSION['role'] != 'root') {
      print_r("<br><span style='color: red; font-weight: bolder; font-size: 22px;'>This Feature is only available for root users!</span>");
      exit();
    }
  ?>
  <body class="framebody">

    <h1>Users</h1>
    <span id="loadingstatus"></span>
    <div class="pane" id="pane_showUsers">
      <h3>All Users</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_showUsers')">
        <i class="fas fa-chevron-up" id="pane_showUsers_chevron"></i>
      </button>
      <table class="table_condensed">
        <tr>
          <th>Username</th>
          <th>Mail</th>
          <th>Role</th>
        </tr>
        <?php
          $config = include('../config.php');
          $SQLhost = $config['SQLhost'];
          $SQLdbname = $config['SQLdbname'];
          $SQLuser = $config['SQLuser'];
          $SQLpass = $config['SQLpass'];

          $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);

          $sql = "SELECT * FROM users";
          $result = $conn->query($sql);

          $hits = $result->num_rows;

          for($lpc=0;$lpc<$hits;$lpc++) {
            $paneID = rand(0,99999999);

            // Get all Server Data

            $sql = "SELECT * FROM users LIMIT 1 OFFSET $lpc--";
            $result = $conn->query($sql);

            $row = $result->fetch_assoc();
            $username = $row['username'];
            $mail = $row['mail'];
            $role = $row['role'];

        ?>
      <tr>
        <td><?php print_r($username); ?></td>
        <td><?php print_r($mail); ?></td>
        <td><?php print_r($role); ?></td>
      </tr>
      <?php
        }
      ?>
      </table>
    </div>
    <div class="pane" id="pane_addUsers">
      <h3>Add User</h3>
      <button class="pane_collapse" onclick="collapsePane('pane_addUsers')">
        <i class="fas fa-chevron-up" id="pane_addUsers_chevron"></i>
      </button>
      <div style="height: 35px; width: 1px;"></div>
      <form method="post" action="./support/addUser.php">
        <div class="flexwrap_line">
          <input autocomplete="off" name="username" placeholder="Username" type="text" class="textinput split"></input>
          <input autocomplete="off" name="role" placeholder="Role (root/user)" type="text" class="textinput split"></input>
          <input autocomplete="off" name="password" placeholder="Password" type="password" class="textinput split"></input>
          <input autocomplete="off" name="mail" placeholder="Mail" type="email" class="textinput split"></input>
        </div>
        <button type="submit" name="addServer" class="buttonLarge">Add User to Database</button>
      </form>
    </div>
  </body>
</html>
