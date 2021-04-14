 <?php
include('Net/SSH2.php'); //must include fpr phpseclib

//$username=$_POST['username'];
//$password=$_POST['pass'];
//$ip=$_POST['ipAddress'];

$username='WIT';
$password='comp4650';
$ssh = new Net_SSH2('192.168.2.103');

$first_hostname = $first_ip = $first_mac = $first_cpu = $first_mem = $first_status = $second_hostname = $second_ip = $second_mac = $second_cpu = $second_mem = $second_status = null;


if (!$ssh->login($username, $password)){
	exit('Login Failed');
}
if (isset($_POST['firstHostname']) && !empty($_POST['firstHostname'])){
	$hostnameCheck = $_POST['firstHostname'];
	if ($hostnameCheck){
		//echo $ssh->exec('hostname');
		$first_hostname = $ssh->exec('hostname');
		//echo ("<br>");
	}
}

if (isset($_POST['firstIP']) && !empty($_POST['firstIP'])){
	$ipCheck = $_POST['firstIP'];
	if ($ipCheck){
		//echo $ssh->exec('ifconfig -a');
		$first_ip = $ssh->exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
		$first_mac = $ssh->exec("ifconfig eth0 | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['firstInfo']) && !empty($_POST['firstInfo'])){
	$infoCheck = $_POST['firstInfo'];
	if ($infoCheck){
		//echo $ssh->exec('lscpu');
		$first_mem = $ssh->exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
		$first_cpu = $ssh->exec("top -n 1 -b | awk '/^%Cpu/{print $2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['firstService']) && !empty($_POST['firstService'])){
	$infoCheck = $_POST['firstService'];
	if ($infoCheck){
		$first_status = $ssh->exec("systemctl show vsftpd.service --no-page | grep 'ActiveState' | cut -f2 -d=");
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
		$second_hostname = $ssh->exec('hostname');
		//echo ("<br>");
	}
}

if (isset($_POST['secondIP']) && !empty($_POST['secondIP'])){
	$ipCheck = $_POST['secondIP'];
	if ($ipCheck){
		//echo $ssh->exec('ifconfig -a');
		$second_ip = $ssh->exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
		$second_mac = $ssh->exec("ifconfig eth0 | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['secondInfo']) && !empty($_POST['secondInfo'])){
	$infoCheck = $_POST['secondInfo'];
	if ($infoCheck){
		//echo $ssh->exec('lscpu');
		$second_mem = $ssh->exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
		$second_cpu = $ssh->exec("top -n 1 -b | awk '/^%Cpu/{print $2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['secondService']) && !empty($_POST['secondService'])){
	$infoCheck = $_POST['secondService'];
	if ($infoCheck){
		$second_status = $ssh->exec(); //Need to implement Service on remote server
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
table {
	width: 50%;
}
</style>

<table>	
	<tr>
		<th>IP</th>
		<td><?php echo $first_ip;?></td>
	</tr>
	<tr>
		<th>Hostname</th>
		<td><?php echo $first_hostname;?></td>
	</tr>
	<tr>
		<th>MAC</th>
		<td><?php echo $first_mac;?></td>
	</tr>
	<tr>
		<th>Server Status</th>
		<td><?php echo $first_status;?></td>
	</tr>
	<tr>
		<th rowspan="2">System Usage %</th>
		<td><?php echo "CPU: $first_cpu";?></td>
	</tr>
	<tr>
		<td><?php echo "Memory: $first_mem";?></td>
	</tr>
</table>
<table>	
	<tr>
		<th>IP</th>
		<td><?php echo $second_ip;?></td>
	</tr>
	<tr>
		<th>Hostname</th>
		<td><?php echo $second_hostname;?></td>
	</tr>
	<tr>
		<th>MAC</th>
		<td><?php echo $second_mac;?></td>
	</tr>
	<tr>
		<th>Server Status</th>
		<td><?php echo $second_status;?></td>
	</tr>
	<tr>
		<th rowspan="2">System Usage %</th>
		<td><?php echo "CPU: $second_cpu";?></td>
	</tr>
	<tr>
		<td><?php echo "Memory: $second_mem";?></td>
	</tr>
</table>
