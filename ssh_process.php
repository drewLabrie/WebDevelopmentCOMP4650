 <?php
include('Net/SSH2.php'); //must include fpr phpseclib

//$username=$_POST['username'];
//$password=$_POST['pass'];
//$ip=$_POST['ipAddress'];

$username='WIT';
$password='comp4650';
$ssh = new Net_SSH2('192.168.2.103');

$hostname=null;
$ip=null;
$mac=null;
$cpu=null;
$mem=null;
$status=null;


if (!$ssh->login($username, $password)){
	exit('Login Failed');
}
if (isset($_POST['firstHostname']) && !empty($_POST['firstHostname'])){
	$hostnameCheck = $_POST['firstHostname'];
	if ($hostnameCheck){
		//echo $ssh->exec('hostname');
		$hostname = $ssh->exec('hostname');
		//echo ("<br>");
	}
}

if (isset($_POST['firstIP']) && !empty($_POST['firstIP'])){
	$ipCheck = $_POST['firstIP'];
	if ($ipCheck){
		//echo $ssh->exec('ifconfig -a');
		$ip = $ssh->exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
		$mac = $ssh->exec("ifconfig eth0 | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['firstInfo']) && !empty($_POST['firstInfo'])){
	$infoCheck = $_POST['firstInfo'];
	if ($infoCheck){
		//echo $ssh->exec('lscpu');
		$mem = $ssh->exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
		$cpu = $ssh->exec("top -n 1 -b | awk '/^%Cpu/{print $2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['firstService']) && !empty($_POST['firstService'])){
	$infoCheck = $_POST['firstService'];
	if ($infoCheck){
		$status = $ssh->exec("systemctl show vsftpd.service --no-page | grep 'ActiveState' | cut -f2 -d=");
		//echo ("<br>");
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
		//echo $ssh->exec('hostname');
		$hostname = $ssh->exec('hostname');
		//echo ("<br>");
	}
}

if (isset($_POST['secondIP']) && !empty($_POST['secondIP'])){
	$ipCheck = $_POST['secondIP'];
	if ($ipCheck){
		//echo $ssh->exec('ifconfig -a');
		$ip = $ssh->exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
		$mac = $ssh->exec("ifconfig eth0 | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['secondInfo']) && !empty($_POST['secondInfo'])){
	$infoCheck = $_POST['secondInfo'];
	if ($infoCheck){
		//echo $ssh->exec('lscpu');
		$mem = $ssh->exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
		$cpu = $ssh->exec("top -n 1 -b | awk '/^%Cpu/{print $2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['secondService']) && !empty($_POST['secondService'])){
	$infoCheck = $_POST['secondService'];
	if ($infoCheck){
		$status = $ssh->exec(); //Need to implement Service on remote server
		//echo ("<br>");
	}
}

if (isset($_POST['secondCommand']) && !empty($_POST['secondCommand'])){
	$firstCommand = $_POST['secondCommand'];
	echo $ssh->exec($firstCommand);
	echo ("<br>");
	
}


?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<table>	
	<tr>
		<th>IP</th>
		<td><?php echo $ip;?></td>
	</tr>
	<tr>
		<th>Hostname</th>
		<td><?php echo $hostname;?></td>
	</tr>
	<tr>
		<th>MAC</th>
		<td><?php echo $mac;?></td>
	</tr>
	<tr>
		<th>Server Status</th>
		<td><?php echo $status;?></td>
	</tr>
	<tr>
		<th rowspan="2">System Usage %</th>
		<td><?php echo "CPU: $cpu";?></td>
	</tr>
	<tr>
		<td><?php echo "Memory: $mem";?></td>
	</tr>

</table>
