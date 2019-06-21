<?php
$path = "../../assets/serverconfigs/".$_POST['configname'].".cfg";
$file = fopen($path,"w");
echo fwrite($file,"");
fclose($file);
header('Location: ../configs.php');
?>
