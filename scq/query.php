<!--
  https://github.com/xPaw/PHP-Source-Query
  https://dano.me.uk/code/querying-source-servers-php-part-1/
-->

<?php

  require __DIR__ . '/SourceQuery/bootstrap.php';
  use xPaw\SourceQuery\SourceQuery;

  define('SQ_TIMEOUT', 1);
  define('SQ_ENGINE', SourceQuery::SOURCE);

  $servers = json_decode(file_get_contents('servers.json'));

  foreach ($servers as $server) {
   switch ($server->protocol) {
   case 'steam':
   $data = fetchSteam($server->id, $server->ip, $server->port, $server->game);
   break;
   }
  }

  function fetchSteam($id, $ip, $port, $game)
  {

 $Query = new SourceQuery();

 try {
 $Query->Connect($ip, $port, SQ_TIMEOUT, SQ_ENGINE);

 $data["info"] = $Query->GetInfo();
 $data["info"]["Game"] = $game;
 $data["info"]["IP"] = $ip;
 $data["info"]["Port"] = $port;
 $data["players"] = $Query->GetPlayers();
 $data["rules"] = $Query->GetRules();

 file_put_contents('servers/' . $id . '.json', json_encode($data));
 } catch (Exception $e) {
 echo $e->getMessage();
 } finally {
 $Query->Disconnect();
 }
}
