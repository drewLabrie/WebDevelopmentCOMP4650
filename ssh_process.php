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
$ipCheck = $_POST['firstIP'];
$infoCheck = $_POST['firstInfo'];

if (!$ssh->login($username, $password)){
	exit('Login Failed');
}
echo "";
if ($hostnameCheck){
	echo $ssh->exec('hostname');
}
echo "";
if ($ipCheck){
	echo $ssh->exec('ifconfig -a');
}
echo "";
if ($infoCheck){
	echo $ssh->exec('lscpu');
}
echo "";
echo $ssh->exec($command);


?>
