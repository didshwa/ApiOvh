<?php
include("../init-test.php");

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
}elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
    $IP = $_SERVER['HTTP_CLIENT_IP'];
}else{
    $IP = $_SERVER['REMOTE_ADDR'];
}
$dom 		= "domaine.com";
$subDomain 	= "home";

$DynHost = new DynHost($ovh);
$DynHost->setdomain($dom);
$res_record_id = $DynHost->getdyndnsid($subDomain);
$record_id = $res_record_id[0];

if(empty($record_id)){
	echo "vide";
}else{
	//echo $record_id;
	$res = $DynHost->getdyndnsdata($record_id);
	
	if ($IP == $res['ip'])
	{
		echo " \r\nL'ip n'a pas change.";
	}else{
		$DynHost->putdyndns($subDomain,$IP,$record_id);
	}
	//print_r($res);
	$DynHost->refresh();
}
