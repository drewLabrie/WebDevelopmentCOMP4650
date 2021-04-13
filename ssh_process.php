<?php
include('Net/SSH2.php'); //must include fpr phpseclib

//$username=$_POST['username'];
//$password=$_POST['pass'];
//$ip=$_POST['ipAddress'];

$username='WIT';
$password='comp4650';
$ssh = new Net_SSH2('192.168.2.103');
if (!$ssh->login($username, $password)){
	exit('Login Failed');
}
if (isset($_POST['firstHostname']) && !empty($_POST['firstHostname'])){
	$hostnameCheck = $_POST['firstHostname'];
	if ($hostnameCheck){
		echo $ssh->exec('hostname');
		echo ("<br>");
	}
}

if (isset($_POST['firstIP']) && !empty($_POST['firstIP'])){
	$ipCheck = $_POST['firstIP'];
	if ($ipCheck){
		echo $ssh->exec('ifconfig -a');
		echo ("<br>");
	}
}

if (isset($_POST['firstInfo']) && !empty($_POST['firstInfo'])){
	$infoCheck = $_POST['firstInfo'];
	if ($infoCheck){
		echo $ssh->exec('lscpu');
		echo ("<br>");
	}
}

if (isset($_POST['firstCommand']) && !empty($_POST['firstCommand'])){
	$firstCommand = $_POST['firstCommand'];
	echo $ssh->exec($firstCommand);
	echo ("<br>");
	
}

$ssh = null;
$ssh = new Net_SSH2('192.168.2.30');

if (!$ssh->login($username, $password)){
	exit('Login Failed');
}

if (isset($_POST['secondHostname']) && !empty($_POST['secondHostname'])){
	$hostnameCheck = $_POST['secondHostname'];
	if ($hostnameCheck){
		echo $ssh->exec('hostname');
		echo ("<br>");
	}
}

if (isset($_POST['secondIP']) && !empty($_POST['secondIP'])){
	$ipCheck = $_POST['secondIP'];
	if ($ipCheck){
		echo $ssh->exec('ifconfig -a');
		echo ("<br>");
	}
}

if (isset($_POST['secondInfo']) && !empty($_POST['secondInfo'])){
	$infoCheck = $_POST['secondInfo'];
	if ($infoCheck){
		echo $ssh->exec('lscpu');
		echo ("<br>");
	}
}

if (isset($_POST['secondCommand']) && !empty($_POST['secondCommand'])){
	$firstCommand = $_POST['secondCommand'];
	echo $ssh->exec($firstCommand);
	echo ("<br>");
	
}


?>
