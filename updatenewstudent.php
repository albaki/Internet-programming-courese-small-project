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


$conn = databaseConnection();


if (isset($_POST['update'])){
$id=$_POST['selector'];
$id2=$_POST['reject'];

$N = count($id);
$N2 = count($id2);

for($i=0; $i < $N; $i++){
	$sql = "UPDATE project SET studentapprove = 'ok' where email='$id[$i]'";
	$result = mysqli_query($conn, $sql);}

for($i=0; $i < $N2; $i++){
	$sql2 = "UPDATE project SET studentapprove = 'no' where email='$id2[$i]'";
	$result = mysqli_query($conn, $sql2);}

	header("location:adminpage.php"); 
} 
?>