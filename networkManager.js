window.onload = function(){
	
	var formSubmit = document.getElementById("networkForm");
		
	formSubmit.addEventListener("submit", function(e){
		
		var user = document.getElementById("username").value;
		var pass = document.getElementById("password").value;
		
		if (user != "Admin"){
			
			alert("incorrect username");
			e.preventDefault();
		}
		
		if (pass != "Pass"){
			
			alert("incorrect password");
			e.preventDefault();
		}

	});
}