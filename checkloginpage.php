<html>
<head>
<title> Registration form </title>
</head>
<body>

	<?php

	session_start();
		
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

		$conn = databaseConnection();


			$Email = (string) $_POST["email"];
			$Password =  (string) $_POST["pass"];
			$tbl_name="project";




			// To protect MySQL injection (more detail about MySQL injection)
			$Email = stripslashes($Email);
			$Password = stripslashes($Password);

			$Email = mysqli_real_escape_string(databaseConnection(), $Email);
			$Password = mysqli_real_escape_string(databaseConnection(), $Password);


			$sqlStudent = "SELECT * FROM $tbl_name WHERE email='$Email' and password='$Password' and studentapprove = 'ok' and usertype = 'Student'";
			$resultStudent = mysqli_query($conn, $sqlStudent);
			// Mysql_num_row is counting table row
			$countStudent = mysqli_num_rows($resultStudent);

			$sqlAdmin = "SELECT * FROM $tbl_name WHERE email='$Email' and password='$Password' and adminapprove = 'ok' and usertype = 'Admin'";
			$resultAdmin = mysqli_query($conn, $sqlAdmin);
			// Mysql_num_row is counting table row
			$countAdmin = mysqli_num_rows($resultAdmin);

			$sqlSuperAdmin = "SELECT * FROM $tbl_name WHERE email='$Email' and password='$Password' and superadmin = 'ok' and usertype = 'Admin'";
			$resultSuperAdmin = mysqli_query($conn, $sqlSuperAdmin);
			// Mysql_num_row is counting table row
			$countSuperAdmin = mysqli_num_rows($resultSuperAdmin);


			// If result matched $myusername and $mypassword, table row must be 1 row
			if($countStudent == 1){


		        $_SESSION['email'] = $Email;
		        $_SESSION['pass'] = $Password;

		        echo "<script>document.location='http://localhost/IITProject/studentpage.php'</script>";
			}elseif ($countAdmin == 1) {

		        $_SESSION['email'] = $Email;
		        $_SESSION['pass'] = $Password;

		        echo "<script>document.location='http://localhost/IITProject/adminpage.php'</script>";
			}elseif ($countSuperAdmin == 1) {

		        $_SESSION['email'] = $Email;
		        $_SESSION['pass'] = $Password;

		        echo "<script>document.location='http://localhost/IITProject/superadminpage.php'</script>";		       
			}
			else {
		        echo "<h1> Wrong username and password </h1>";
		    echo '<a href="login.php"><button>back</button></a>';
			}

	?>

</body>

</html>

