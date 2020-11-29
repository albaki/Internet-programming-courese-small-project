
<html>
<head>
<title> Registration form </title>
</head>
<body>

	<?php


		
		 function databaseConnection(){

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
				echo "Connection failed: " . mysqli_connect_error();
				return null;
			}
			return $conn;
		}


		function dataEntry($conn){
			$Name =  (string) $_POST["name"];
			$Email = (string) $_POST["email"];
			$Mobile = (string) $_POST["mobile"];
			$Address = (string) $_POST["address"];
			$UserType = (string) $_POST["userType"];
			$FathersName =  (string) $_POST["fname"];
			$MothersName =  (string) $_POST["mname"];
			$Degree =  (string) $_POST["degree"];
			$RegistrationNo =  (string) $_POST["regno"];
			$Password =  (string) $_POST["pass"];
			$PasswordCon =  (string) $_POST["conpass"];

			$sql = "INSERT INTO project (name, email, mobile, address, usertype, fathername, mothername, degree, regno, password)
			VALUES ('$Name', '$Email', '$Mobile', '$Address',	'$UserType', '$FathersName', '$MothersName', '$Degree',
			'$RegistrationNo','$Password')";

			if (mysqli_query($conn, $sql)) {
			echo "<script>alert('User created successfully')</script>";
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}



		

		$conn = databaseConnection();
		dataEntry($conn);

		if ($conn != null){
			mysqli_close($conn);
			echo "<script>document.location='http://localhost/IITProject/login.php'</script>";
		}
		


	

	// $Name =  (string) $_POST["name"];
	// $Email = (string) $_POST["email"];
	// $Mobile = (string) $_POST["mobile"];
	// $Address = (string) $_POST["address"];
	// $UserType = (string) $_POST["userType"];
	// $FathersName =  (string) $_POST["fname"];
	// $MothersName =  (string) $_POST["mname"];
	// $Degree =  (string) $_POST["degree"];
	// $RegistrationNo =  (string) $_POST["regno"];
	// $Password =  (string) $_POST["pass"];
	// $PasswordCon =  (string) $_POST["conpass"];


	
	


	// echo"<h2> your Name: ".$Name. "</h2><br>";
	// echo"<h2> your Email: ".$Email."</h2><br>";
	// echo"<h2> your Mobile: ".$Mobile."</h2><br>";
	// echo"<h2> your Address: ".$Address."</h2><br>";
	// echo"<h2> your User Type: ".$UserType."</h2><br>";
	// echo"<h2> your Father's Name: ".$FathersName."</h2><br>";
	// echo"<h2> your Mother's Name: ".$MothersName."</h2><br>";
	// echo"<h2> your Degree: ".$Degree."</h2><br>";
	// echo"<h2> your Registration No: ".$RegistrationNo."</h2><br>";
	// echo"<h2> your Password: ".$Password."</h2><br>";
	// echo"<h2> your Confirm Password: ".$PasswordCon."</h2><br>";





	?>

</body>
</html>



