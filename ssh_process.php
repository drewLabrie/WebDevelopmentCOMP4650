 <?php
include('Net/SSH2.php'); //must include fpr phpseclib

//$username=$_POST['username'];
//$password=$_POST['pass'];
//$ip=$_POST['ipAddress'];

$username='WIT';
$password='comp4650';
$ssh = new Net_SSH2('192.168.2.20'); //FTP Server

$first_hostname = $first_ip = $first_mac = $first_cpu = $first_mem = $first_status = $first_command = $second_hostname = $second_ip = $second_mac = $second_cpu = $second_mem = $second_status = $second_command = $third_hostname = $third_ip = $third_mac = $third_cpu = $third_mem = $third_status = $third_command = $fourth_hostname = $fourth_ip = $fourth_mac = $fourth_cpu = $fourth_mem = $fourth_status = $fourth_command= null;


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
	$first_command = $ssh->exec($firstCommand);
	//echo $ssh->exec($firstCommand);
	//echo ("<br>");
	
}

$ssh = null;
$ssh = new Net_SSH2('192.168.2.30'); //MailServer

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
		$second_status = $ssh->exec("systemctl show sshd --no-page | grep 'ActiveState' | cut -f2 -d="); //Currently shows status of ssh daemon
		//echo ("<br>");
	}
}

if (isset($_POST['secondCommand']) && !empty($_POST['secondCommand'])){
	$secondCommand = $_POST['secondCommand'];
	$second_command = $ssh->exec($secondCommand);
	
}

$ssh = null;
$ssh = new Net_SSH2('192.168.2.40'); //Server3 I couldn't think of a hostname

if (!$ssh->login($username, $password)){
	exit('Login Failed');
}

if (isset($_POST['thirdHostname']) && !empty($_POST['thirdHostname'])){
	$hostnameCheck = $_POST['thirdHostname'];
	if ($hostnameCheck){
		//echo $ssh->exec('hostname');
		$third_hostname = $ssh->exec('hostname');
		//echo ("<br>");
	}
}

if (isset($_POST['thirdIP']) && !empty($_POST['thirdIP'])){
	$ipCheck = $_POST['thirdIP'];
	if ($ipCheck){
		//echo $ssh->exec('ifconfig -a');
		$third_ip = $ssh->exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
		$third_mac = $ssh->exec("ifconfig eth0 | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['thirdInfo']) && !empty($_POST['thirdInfo'])){
	$infoCheck = $_POST['thirdInfo'];
	if ($infoCheck){
		//echo $ssh->exec('lscpu');
		$third_mem = $ssh->exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
		$third_cpu = $ssh->exec("top -n 1 -b | awk '/^%Cpu/{print $2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['thirdService']) && !empty($_POST['thirdService'])){
	$infoCheck = $_POST['thirdService'];
	if ($infoCheck){
		$third_status = $ssh->exec("systemctl show sshd --no-page | grep 'ActiveState' | cut -f2 -d="); //Currently shows status of ssh daemon
		//echo ("<br>");
	}
}

if (isset($_POST['thirdCommand']) && !empty($_POST['thirdCommand'])){
	$thirdCommand = $_POST['thirdCommand'];
	$third_command = $ssh->exec($thirdCommand);
	
}

$ssh = null;
$ssh = new Net_SSH2('192.168.2.50'); //WebServer2

if (!$ssh->login($username, $password)){
	exit('Login Failed');
}

if (isset($_POST['fourthHostname']) && !empty($_POST['fourthHostname'])){
	$hostnameCheck = $_POST['fourthHostname'];
	if ($hostnameCheck){
		//echo $ssh->exec('hostname');
		$fourth_hostname = $ssh->exec('hostname');
		//echo ("<br>");
	}
}

if (isset($_POST['fourthIP']) && !empty($_POST['fourthIP'])){
	$ipCheck = $_POST['fourthIP'];
	if ($ipCheck){
		//echo $ssh->exec('ifconfig -a');
		$fourth_ip = $ssh->exec("ifconfig eth0 | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
		$fourth_mac = $ssh->exec("ifconfig eth0 | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['fourthInfo']) && !empty($_POST['fourthInfo'])){
	$infoCheck = $_POST['fourthInfo'];
	if ($infoCheck){
		//echo $ssh->exec('lscpu');
		$fourth_mem = $ssh->exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");
		$fourth_cpu = $ssh->exec("top -n 1 -b | awk '/^%Cpu/{print $2}'");
		//echo ("<br>");
	}
}

if (isset($_POST['fourthService']) && !empty($_POST['fourthService'])){
	$infoCheck = $_POST['fourthService'];
	if ($infoCheck){
		$fourth_status = $ssh->exec("systemctl show httpd --no-page | grep 'ActiveState' | cut -f2 -d="); //secondWebServer
		//echo ("<br>");
	}
}

if (isset($_POST['fourthCommand']) && !empty($_POST['fourthCommand'])){
	$fourthCommand = $_POST['fourthCommand'];
	$fourth_command = $ssh->exec($fourthCommand);
	
}
$array = array($first_hostname, $first_ip, $first_mac, $first_cpu, $first_mem, $first_status, $first_command, $second_hostname, $second_ip, $second_mac, $second_cpu, $second_mem, $second_status, $second_command, $third_hostname, $third_ip, $third_mac, $third_cpu, $third_mem, $third_status, $third_command, $fourth_hostname, $fourth_ip, $fourth_mac, $fourth_cpu, $fourth_mem, $fourth_status, $fourth_command);
echo json_encode($array); //encode for ajax to process

?>
