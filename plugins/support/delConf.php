<?php
unlink("../../assets/serverconfigs/".$_POST['configname'].".cfg");
header('Location: ../configs.php');
?>
