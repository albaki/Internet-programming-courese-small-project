
<html>
<head>
<title> Sudent </title>

<style type="text/css">

#user_box {

position: relative;
top: -1%;
left: 90%;
}

.b {
  position: relative;
  top: -1%;
  left: 48%;
}
.button {
  position: relative;
  top: -1%;
  left: 43%;
}

.center {
  margin-left: auto;
  margin-right: auto;
}


</style>

</head>
<body>


<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
	session_start();

	if(isset($_SESSION['email']) && isset($_SESSION['pass'])){
        echo "<h1 style='text-align:center'> Welcome to student page </h1>";
        echo "<a href= 'logout.php'><button id='user_box'>Logout</button></a>";




        // if(array_key_exists('approved', $_POST)) { 
        //     echo "This is the list of approved students"; 
        // } 
        // else if(array_key_exists('notapproved', $_POST)) { 
        //     echo "This is the list of not approved students";
        // } 
        // else if (array_key_exists('pending', $_POST)){
        // 	echo "This is the list of pending application of students";
        // }
	} 
	else {
		header("location:login.php");
	}

?>



  <br><br>

    <form  method='post'> 
        <input type="submit" name="info"
                class="button" value="Application" /> 
          
        <input type="submit" name="status"
                class="button" value="Application Status" /> 
<!--         <input type="submit" name="pending"
                class="button" value="Pending" />  -->
    </form> 


<?php

	if (array_key_exists('info', $_POST)){

        	
        	echo "<form method='post' action='studentDB2.php'>";
        	echo "<input type='submit' class='b' value='Apply' name='apply'>";
        	echo "<br><br>";
        	dataView();
        	
        	echo "</form>";
        }elseif (array_key_exists('status', $_POST)) {
        	applicationstatus();        }

        function dataView(){
        	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			$sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, studentapprove FROM project WHERE studentapprove = 'ok' AND usertype = 'Student' AND email = '".$_SESSION['email']."'";
			$result = mysqli_query($conn, $sql);
			// echo mysqli_num_rows($result);
			echo "<table border='1' class='center'>";
			echo "<tr>";
			echo "<th> Name</th> <th>Email</th> <th>Mobile No.</th> <th>Address</th> <th>User Type</th> <th>Father's name</th> <th>Mother's name</th> <th>Last degree</th> <th>Registration No</th> <th>date</th> <th>Apply</th>";
			echo "</tr>";

			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			

			$date = date("Y/m/d");

			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>"  . $row['email'] . "</td>";
			echo "<td>" . $row['mobile'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>" . $row['fathername'] . "</td>";
			echo "<td>" . $row['mothername'] . "</td>";
			echo "<td>" . $row['degree'] . "</td>";
			echo "<td>" . $row['regno'] . "</td>";
			echo "<td>" . $date . "</td>";
			echo "<td>Apply<input name='selector' type='checkbox' value='applied'></td>";
			echo "<input name='name' type='hidden' value=".$row['name'].">";
			echo "<input name='email' type='hidden' value=".$row['email'].">";
			echo "<input name='mobile' type='hidden' value=".$row['mobile'].">";
			echo "<input name='address' type='hidden' value=".$row['address'].">";
			echo "<input name='usertype' type='hidden' value=".$row['usertype'].">";
			echo "<input name='fathername' type='hidden' value=".$row['fathername'].">";
			echo "<input name='mothername' type='hidden' value=".$row['mothername'].">";
			echo "<input name='degree' type='hidden' value=".$row['degree'].">";
			echo "<input name='regno' type='hidden' value=".$row['regno'].">";
			echo "<input name='date' type='hidden' value=".$date.">";
			// echo "<td><input name='reject[]' type='checkbox' value=".$id."><td>";
			echo "</tr>";
			}
			} else {
			echo "<strong>No pending application found.</strong>";
			}
		}



		function applicationstatus(){
        	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			$sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, todaysdate, applystatus, approvestatus FROM s_apply WHERE applystatus = 'applied' AND email = '".$_SESSION['email']."'";
			$result = mysqli_query($conn, $sql);
			// echo mysqli_num_rows($result);
			echo "<table border='1' class='center'>";
			echo "<tr>";
			echo "<th> Name</th> <th>Email</th> <th>Mobile No.</th> <th>Address</th> <th>User Type</th> <th>Father's name</th> <th>Mother's name</th> <th>Last degree</th> <th>Registration No</th> <th>Date</th> <th>Application Status</th> <th>Approval Status</th>";
			echo "</tr>";

			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			



			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>"  . $row['email'] . "</td>";
			echo "<td>" . $row['mobile'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>" . $row['fathername'] . "</td>";
			echo "<td>" . $row['mothername'] . "</td>";
			echo "<td>" . $row['degree'] . "</td>";
			echo "<td>" . $row['regno'] . "</td>";
			echo "<td>" . $row['todaysdate'] . "</td>";
			echo "<td>" . $row['applystatus'] . "</td>";
			echo "<td>" . $row['approvestatus'] . "</td>";

			echo "</tr>";
			}
			} else {
			echo "<strong>No pending application found.</strong>";
			}
		}