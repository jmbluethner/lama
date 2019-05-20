<h1>Query a Server</h1>
<form method="get" action="queryUserdata.php">
  <input type="text" placeholder="IP" name="ip"></input>
  <input type="text" placeholder="Port" name="port"></input>
  <button type="submit">Query Server</button>
</form>
<h1>Exec rcon Command on Server</h1>
<form method="get" action="rconUserdata.php">
  <input type="text" placeholder="IP" name="ip"></input>
  <input type="text" placeholder="Port" name="port"></input>
  <input type="text" placeholder="Rcon Password" name="rconpw"></input>
  <input type="text" placeholder="Command" name="command"></input>
  <button type="submit">Exec rcon</button>
</form>
<!--
  server.cfg muss folgendes beinhalten:

  host_name_store 1
  host_info_show 1
  host_players_show 2
-->
