<html>

	<head>
		<title>Network Manager</title>
		<link rel="stylesheet" href="webDevForm2.css" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	</head>
	<!--do php login validation to connect to database-->
	
<?php
	$message="";
	$validated = false;
	if(count($_POST)>0){
		$conn = mysqli_connect("localhost","root","", "WebDevelopmentDB");
		$result = mysqli_query($conn, "SELECT * FROM UserAccounts WHERE userName='" . $_POST["username"] . "' and password = '". $_POST["pass"]."'");
		$count  = mysqli_num_rows($result);
		if($count==0) {
		$message = "Invalid Username or Password!";
		} 
		else {
			$message = "You are successfully authenticated!";
			$validated = true;
		}
}
?>


	
<?php 
	
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
		<form id ="myForm" form method="post" action="ssh_process.php" class="form-container">
			<div class = "grid-container">
			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>FTP Server</h1>
				<h3>IP Address: 192.168.2.20</h3>
				<div class="myDiv">
					<h4>Request Hostname?<input type="checkbox" class="requestButton" name="firstHostname"></h4>
					<h5 id = "hostname1"></h5>
				</div>
				<div class="myDiv">
					<h4>Request Addressing Info?<input type="checkbox" class="requestButton" name="firstIP"></h4>
					<h5 id = "ip1"></h5>
					<h5 id = "mac1"></h5>
				</div>
				<div class="myDiv">
					<h4>Request System Usage?<input type="checkbox" class="requestButton" name="firstInfo"></h4>
					<h5 id = "cpu1"></h5>
					<h5 id = "mem1"></h5>
				</div>
				<div class="myDiv">
					<h4>Request FTP Status?<input type="checkbox" class="requestButton" name="firstService"></h4>
					<h5 id = "service1"></h5>
				</div>
				<div class = "myDiv">
					<h4>Custom Command?<input type="text" class="requestButton" name="firstCommand"></h4>
					<h5 id = "command1"></h5>
				</div>
				<button type="submit" class="requestButton">Request Information</button>	
				</div>
			</div>

			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>Mail Server</h1>
				<h3>IP Address: 192.168.2.30</h3>
				<div class="myDiv">
					<h4>Request Hostname?<input type="checkbox" class="requestButton" name="secondHostname"></h4>
					<h5 id = "hostname2"></h5>
				</div>
				<div class="myDiv">
					<h4>Request Addressing Info?<input type="checkbox" class="requestButton" name="secondIP"></h4>
					<h5 id = "ip2"></h5>
					<h5 id = "mac2"></h5>
				</div>
				<div class="myDiv">
					<h4>Request System Usage?<input type="checkbox" class="requestButton" name="secondInfo"></h4>
					<h5 id = "cpu2"></h5>
					<h5 id = "mem2"></h5>
				</div>
				<div class="myDiv">
					<h4>Request SMTP Status?<input type="checkbox" class="requestButton" name="secondService"></h4>
					<h5 id = "service2"></h5>
				</div>
				<div class = "myDiv">
					<h4>Custom Command?<input type="text" class="requestButton" name="secondCommand"></h4>
					<h5 id = "command2"></h5>
				</div>
				<button type="submit" class="requestButton">Request Information</button>
				</div>
			</div>
			
			<div class="card" style="width:100%;max-width:500px;">
				<div class="container" >
				<h1>Server3</h1>
				<h3>IP Address: 192.168.2.40</h3>
				<div class="myDiv">
					<h4>Request Hostname?<input type="checkbox" class="requestButton" name="thirdHostname"></h4>
					<h5 id = "hostname3"></h5>
				</div>
				<div class="myDiv">
					<h4>Request Addressing Info?<input type="checkbox" class="requestButton" name="thirdIP"></h4>
					<h5 id = "ip3"></h5>
					<h5 id = "mac3"></h5>
				</div>
				<div class="myDiv">
					<h4>Request System Usage?<input type="checkbox" class="requestButton" name="thirdInfo"></h4>
					<h5 id = "cpu3"></h5>
					<h5 id = "mem3"></h5>
				</div>
				<div class="myDiv">
					<h4>Request Service Status?<input type="checkbox" class="requestButton" name="thirdService"></h4>
					<h5 id = "service3"></h5>
				</div>
				<div class = "myDiv">
					<h4>Custom Command?<input type="text" class="requestButton" name="thirdCommand"></h4>
					<h5 id = "command3"></h5>
				</div>
				<button type="submit" class="requestButton">Request Information</button>
				</div>
			</div>

			<div class="card" style="width:100%;max-width:500px;">
				<div class="container">
				<h1>Web Server 2</h1>
				<h3>IP Address: 192.168.2.50</h3>
				<div class="myDiv">
					<h4>Request Hostname?<input type="checkbox" class="requestButton" name="fourthHostname"></h4>
					<h5 id = "hostname4"></h5>
				</div>
				<div class="myDiv">
					<h4>Request Addressing Info?<input type="checkbox" class="requestButton" name="fourthIP"></h4>
					<h5 id = "ip4"></h5>
					<h5 id = "mac4"></h5>
				</div>
				<div class="myDiv">
					<h4>Request System Usage?<input type="checkbox" class="requestButton" name="fourthInfo"></h4>
					<h5 id = "cpu4"></h5>
					<h5 id = "mem4"></h5>
				</div>
				<div class="myDiv">
					<h4>Request Apache Status?<input type="checkbox" class="requestButton" name="fourthService"></h4>
					<h5 id = "service4"></h5>
				</div>
				<div class = "myDiv">
					<h4>Custom Command?<input type="text" class="requestButton" name="fourthCommand"></h4>
					<h5 id = "command4"></h5>
				</div>
				<button type="submit" class="requestButton">Request Information</button>
				</div>
			</div>

			</div>

			</fieldset>
		</form>

	</body>
		<script>

      $(document).ready(function(){
     	 $("#myForm").submit(function(e){
      		 e.preventDefault();
      		 $.ajax({
      		 	url: $(this).attr('action'),
      		 	type: 'post',
      		 	data: $(this).serialize(),
      		 	dataType: 'json',
      		 	success: function(data){
      		 		$("#hostname1").html(data[0]);
      		 		$("#ip1").html(data[1]);
      		 		$("#mac1").html(data[2]);
      		 		$("#cpu1").html(data[3]);
      		 		$("#mem1").html(data[4]);
      		 		$("#service1").html(data[5]);
      		 		$("#command1").html(data[6]);
      		 		$("#hostname2").html(data[7]);
      		 		$("#ip2").html(data[8]);
      		 		$("#mac2").html(data[9]);
      		 		$("#cpu2").html(data[10]);
      		 		$("#mem2").html(data[11]);
      		 		$("#service2").html(data[12]);
      		 		$("#command2").html(data[13]);
				$("#hostname3").html(data[14]);
      		 		$("#ip3").html(data[15]);
      		 		$("#mac3").html(data[16]);
      		 		$("#cpu3").html(data[17]);
      		 		$("#mem3").html(data[18]);
      		 		$("#service3").html(data[19]);
      		 		$("#command3").html(data[20]);
				$("#hostname4").html(data[21]);
      		 		$("#ip4").html(data[22]);
      		 		$("#mac4").html(data[23]);
      		 		$("#cpu4").html(data[24]);
      		 		$("#mem4").html(data[25]);
      		 		$("#service4").html(data[26]);
      		 		$("#command4").html(data[27]);
      		 	}
      		 });

     	 });
      })

		</script>
<?php } ?>
	
	
	
</html>
			
