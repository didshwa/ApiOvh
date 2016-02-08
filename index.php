<?php
session_start();
$timestart=microtime(true);
include("class/OvhApi.php");
include("class/domaine.php");
///Keys
$AK = 'xxxxxxxxxxxx';
$SK = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$CK = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$_SESSION["ck"] = $CK;
///Initialisation
$ovh = new OvhApi(OvhApi::$roots["ovh-eu"], $AK, $SK);



/* script à tester */
$timeend=microtime(true);
$time=$timeend-$timestart;
$page_load_time = number_format($time, 3);
echo "<br><br><br>Script execute en " .$page_load_time. " sec";
?>
