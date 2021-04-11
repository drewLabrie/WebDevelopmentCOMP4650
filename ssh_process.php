<?php
include('Net/SSH2.php'); //must include fpr phpseclib

$username=$_POST['username'];
$password=$_POST['pass'];
$command=$_POST['command']; //test demo purposes

$ssh = new Net_SSH2('192.168.2.103');

if (!$ssh->login($username, $password)){
	exit(alert ('Login Failed'));
} 

echo $ssh->exec($command);


?>