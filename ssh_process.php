<?php
include('Net/SSH2.php'); //must include fpr phpseclib

//$username=$_POST['username'];
//$password=$_POST['pass'];
//$ip=$_POST['ipAddress'];
$command=$_POST['command']; //test demo purposes

$username='WIT';
$password='comp4650';
$ssh = new Net_SSH2('192.168.2.103');
$hostnameCheck = $_POST['firstHostname'];

if (!$ssh->login($username, $password)){
	exit('Login Failed');
}

if (!$hostnameCheck){
	echo $ssh->exec('hostname');
}

echo $ssh->exec($command);


?>
