<html>

	<head>
		<title>Network Manager</title>
		<link rel="stylesheet" href="webDevForm2.css" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<!--do php login validation to connect to database-->
	
<?php
	$message="";
	echo "2";
	if(count($_POST)>0){
		echo "3";
		$conn = mysqli_connect("localhost","root","", "WebDevelopmentDB");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully";
		$result = mysqli_query($conn, "SELECT * FROM UserAccounts WHERE userName='" . $_POST["username"] . "' and password = '". $_POST["pass"]."'");
		$count  = mysqli_num_rows($result);
		if($count==0) {
		$message = "Invalid Username or Password!";
		echo($message);
		} 
		else {
			$message = "You are successfully authenticated!";
			$validated = true;
			echo($message);
		}
}
?>


	
<?php 
	$validated = false;

if (!$validated){ ?>
	<body>
		<form method="post" action="" id="networkForm">
		<fieldset>
		
			<img src="images/leopard.jpg" class="leopardLogo" />
			<img src="images/leopard.jpg" />
			<div class="projectHeader">
			<h2>COMP 4650 Web Development Project</h2>
			<h3>Network Configuration Tool</h3>
			</div>
			<div class="loginBox">
			<label for="username"><b>Username:</b></label>
			<input type="text" placeholder="Enter Username" name="username" id="username" required>
			<br/>
			<label for="pass"><b>Password:</b></label>
			<input type="password" placeholder="Enter Password" name="pass" id="password" required>
			<br/>
			<button type="submit" class="btn">Login</button>
			</div>
			
		</fieldset>
		
		<div class="bottomHeaderTeam">Team Name: Network Outage</div>
		<div class="bottomHeaderMembers">Group Members: Drew Labrie, Marcus Wong, Prarthna Bhaththiwala</div>
	</body>
	
<?php } else{ ?>
	
	<body>
		<form method="post" action="ssh_process.php" class="form-container">
			<div class = "grid-container">
			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>FTP Server</h1>
				<h3>IP Address: 192.168.2.103</h3>
				<h4>Request Hostname?<input type="checkbox" class="requestButton" name="firstHostname"></h4>
				<h4>Request Addressing Info?<input type="checkbox" class="requestButton" name="firstIP"></h4>
				<h4>Request System Usage?<input type="checkbox" class="requestButton" name="firstInfo"></h4>
				<h4>Request FTP Status?<input type="checkbox" class="requestButton" name="firstService"></h4>
				<h4>Custom Command?<input type="text" class="requestButton" name="firstCommand"></h4>
				<button type="submit" class="btn">Request Information</button>
				</div>
			</div>

			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>Mail Server</h1>
				<h3>IP Address: 192.168.2.30</h3>
				<h4>Request Hostname?<input type="checkbox" class="requestButton" name="secondHostname"></h4>
				<h4>Request Addressing Info?<input type="checkbox" class="requestButton" name="secondIP"></h4>
				<h4>Request System Usage?<input type="checkbox" class="requestButton" name="secondInfo"></h4>
				<h4>Request SMTP Status?<input type="checkbox" class="requestButton" name="secondService"></h4>
				<h4>Custom Command?<input type="text" class="requestButton" name="secondCommand"></h4>
				<button type="submit" class="btn">Request Information</button>
				</div>
			</div>

			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>Random Server</h1>
				<h3>IP Address: blah blah blah</h3>
				<h4>Request Hostname?<input type="checkbox" class="requestButton"></h4>
				<h4>Request IP Address?<input type="checkbox" class="requestButton"></h4>
				<h4>Request System Usage?<input type="checkbox" class="requestButton"></h4>
				<h4>Custom Command?<input type="text" class="requestButton" name="command"></h4>

				<button type="submit" class="btn">Request Information</button>	
				</div>
			</div>

			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>Random Server</h1>
				<h3>IP Address: blah blah blah</h3>
				<h4>Request hostname?<input type="checkbox" class="requestButton"></h4>
				<h4>Request ip information?<input type="checkbox" class="requestButton"></h4>
				<h4>Request server info<input type="checkbox" class="requestButton"></h4>
				<h4>Custom Command?<input type="text" class="requestButton" name="command"></h4>
				<button type="submit" class="btn">Request Information</button>
				</div>
			</div>
			</div>

				<button type="submit" class="btn">Request Information</button>

		</form>

	</body>
	
<?php } ?>
	
	
	
</html>
			