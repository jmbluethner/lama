<?php
$fp = fopen('../../assets/serverconfigs/'.$_POST['configName'].'.cfg', 'w');
fwrite($fp, $_POST['configContent']);
fclose($fp);
header('Location: ../configs.php');
?>
