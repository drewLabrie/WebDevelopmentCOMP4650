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
	}
}

if (isset($_POST['firstIP']) && !empty($_POST['firstIP'])){
	$ipCheck = $_POST['firstIP'];
	if ($ipCheck){
		echo $ssh->exec('ifconfig -a');
	}
}

if (isset($_POST['firstInfo']) && !empty($_POST['firstInfo'])){
	$infoCheck = $_POST['firstInfo'];
	if ($infoCheck){
		echo $ssh->exec('lscpu');
	}
}

if (isset($_POST['command']) && !empty($_POST['command'])){
	$command=$_POST['command'];
	echo $ssh->exec($command);
	
}

?>
