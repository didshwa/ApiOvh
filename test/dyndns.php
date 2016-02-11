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

$dns = new Dns($ovh);
$dns->setdomain($dom);
$res_record_id = $dns->getdyndnsid($subDomain);
$record_id = $res_record_id[0];

if(empty($record_id)){
	echo "vide";
}else{
	//echo $record_id;
	$res = $dns->getdyndnsdata($record_id);
	
	if ($IP == $res['ip'])
	{
		echo " \r\nL'ip n'a pas change.";
	}else{
		$dns->putdyndns($subDomain,$IP,$record_id);
	}
	//print_r($res);
	$dns->refresh();
}
