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
	$sql = "UPDATE project SET adminapprove = 'ok' where email='$id[$i]'";
	$result = mysqli_query($conn, $sql);}

for($i=0; $i < $N2; $i++){
	$sql2 = "UPDATE project SET adminapprove = 'no' where email='$id2[$i]'";
	$result = mysqli_query($conn, $sql2);}

	echo "<script>document.location='http://localhost/IITProject/superadminpage.php'</script>";

	// header("location: superadminpage.php"); 
} 


if (isset($_POST['testimonial'])){
$id=$_POST['selector'];
$id2=$_POST['reject'];

foreach ($id as $key => $value) {
	// echo ($key);
	// echo ($value);

	$sql = "UPDATE s_apply SET approvestatus = 'approved' where email='$key' AND todaysdate='$value' AND approvestatus = ''";
	$result = mysqli_query($conn, $sql);
}

foreach ($id2 as $key => $value) {
	// echo ($key);
	// echo ($value);

	$sql = "UPDATE s_apply SET approvestatus = 'rejected' where email='$key' AND todaysdate='$value' AND approvestatus = ''";
	$result = mysqli_query($conn, $sql);
}

// $id3=$_POST['date'];

// $N = count($id);
// $N2 = count($id2);

// if ($N > 0){
// 	for($i=0; $i < $N; $i++){
// 		$sql = "UPDATE s_apply SET approvestatus = 'approved' where email='$id[$i]' AND todaysdate='$id3[$i]' AND approvestatus = ''";
// 		$result = mysqli_query($conn, $sql);
// 	}
// }

// else if ($N2 > 0){
// 	for($i=0; $i < $N2; $i++){
// 		$sql2 = "UPDATE s_apply SET approvestatus = 'rejected' where email='$id2[$i]' AND todaysdate='$id3[$i]' AND approvestatus = ''";
// 		$result = mysqli_query($conn, $sql2);
// 	}
// }

	echo "<script>document.location='http://localhost/IITProject/adminpage_two.php'</script>";

	// header("location: adminpage_two.php"); 
} 
?>