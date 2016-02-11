<?php
include("class/OvhApi.php");
include("class/dns.php");
include("class/domaine.php");

///Keys
$AK = 'xxxxxxxxxxxx';
$SK = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$CK = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$_SESSION["ck"] = $CK;
///Initialisation
$ovh = new OvhApi(OvhApi::$roots["ovh-eu"], $AK, $SK);
