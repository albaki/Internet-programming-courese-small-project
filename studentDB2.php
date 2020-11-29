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
			if((string)$_POST["selector"]!=''){
				$Name =  (string) $_POST["name"];
				$Email = (string) $_POST["email"];
				$Mobile = (string) $_POST["mobile"];
				$Address = (string) $_POST["address"];
				$UserType = (string) $_POST["usertype"];
				$FathersName =  (string) $_POST["fathername"];
				$MothersName =  (string) $_POST["mothername"];
				$Degree =  (string) $_POST["degree"];
				$RegistrationNo =  (string) $_POST["regno"];
				$Date =  (string) $_POST["date"];
				$Applystatus =  (string) $_POST["selector"];

				$sql = "INSERT INTO s_apply (name, email, mobile, address, usertype, fathername, mothername, degree, regno, todaysdate, applystatus)
				VALUES ('$Name', '$Email', '$Mobile', '$Address',	'$UserType', '$FathersName', '$MothersName', '$Degree',
				'$RegistrationNo','$Date', '$Applystatus')";

				if (mysqli_query($conn, $sql)) {
				echo "<script>alert('User created successfully')</script>";
				} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}else {
				echo "<script>alert('Please select the checkbox to apply')</script>";
			}
		}







if (isset($_POST['apply'])){

	$conn = databaseConnection();

	dataEntry($conn);
echo ($_POST['selector']);

			// echo "<td name='name'>" . $row['name'] . "</td>";
			// echo "<td name='email'>" . $row['email'] . "</td>";
			// echo "<td name='mobile'>" . $row['mobile'] . "</td>";
			// echo "<td name='address'>" . $row['address'] . "</td>";
			// echo "<td name='usertype'>" . $row['usertype'] . "</td>";
			// echo "<td name='fathername'>" . $row['fathername'] . "</td>";
			// echo "<td name='mothername'>" . $row['mothername'] . "</td>";
			// echo "<td name='degree'>" . $row['degree'] . "</td>";
			// echo "<td name='regno'>" . $row['regno'] . "</td>";
			// echo "<td name='date'>" . date("Y/m/d") . "</td>";
			// echo "<td>Apply<input name='selector' type='checkbox' value=".$id."><td>";
// echo ($_POST['selector']);
echo ($_POST['name']);
echo ($_POST['email']);
echo ($_POST['mobile']);
echo ($_POST['address']);
echo ($_POST['usertype']);
echo ($_POST['fathername']);
echo ($_POST['mothername']);
echo ($_POST['degree']);
echo ($_POST['regno']);
echo ($_POST['date']);

// $N = count($id);


// for($i=0; $i < $N; $i++){
// 	$sql = "UPDATE project SET studentapprove = 'ok' where email='$id[$i]'";
// 	$result = mysqli_query($conn, $sql);}

	header("location:studentpage.php"); 
} 
?>