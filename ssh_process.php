<?php
include('Net/SSH2.php'); //must include fpr phpseclib

$username=$_POST['username'];
$password=$_POST['pass'];
$ip=$_POST['ipAddress'];
$command=$_POST['command']; //test demo purposes

$ssh = new Net_SSH2($ip);

if (!$ssh->login($username, $password)){
	exit('Login Failed');
} 

echo $ssh->exec($command);


?>
