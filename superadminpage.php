
<html>
<head>
<title> Super Admin </title>

<style type="text/css">

#user_box {

position: relative;
top: -1%;
left: 90%;
}

.b {
  position: relative;
  top: -1%;
  left: 44%;
}
.button {
  position: relative;
  top: -1%;
  left: 40%;
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
        echo "<h1 style='text-align:center'> Welcome to super admin page </h1>";
        echo "<a href= 'logout.php'><button id='user_box'>Logout</button></a>";



        if(array_key_exists('approved', $_POST)) { 
            echo "This is the list of approved admin access"; 
        } 
        else if(array_key_exists('notapproved', $_POST)) { 
            echo "This is the list of rejected admin access";
        } 
        else if (array_key_exists('pending', $_POST)){
        	echo "This is the list of pending application of admin access";
        }
	} 
	else {
		header("location:login.php");
	}

?>




  <br><br>

    <form  method='post'> 
        <input type="submit" name="approved"
                class="button" value="Approved" /> 
          
        <input type="submit" name="notapproved"
                class="button" value="Rejected" /> 
        <input type="submit" name="pending"
                class="button" value="Pending" /> 
    </form> 




    <?php
        if(array_key_exists('approved', $_POST)) { 
            approved(); 
        } 
        else if(array_key_exists('notapproved', $_POST)) { 
            notapproved(); 
        } 
        else if (array_key_exists('pending', $_POST)){

        	
        	echo "<form method='post' action='updatenewadmin.php'>";
        	echo "<input type='submit' class='b' value='Update pending' name='update'>";
        	echo "<br>";
        	dataView();
        	
        	echo "</form>";
        }

        function approved() { 

            

            $servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);


            $sql = "SELECT name, email, mobile, address, usertype, adminapprove FROM project WHERE adminapprove = 'ok' AND superadmin = '' ";
			$result = mysqli_query($conn, $sql);
			// echo mysqli_num_rows($result);
			echo "<table border='1' class='center'>";
			echo "<tr>";
			echo "<th> Name</th> <th>Email</th> <th>Mobile No.</th> <th>Address</th> <th>User Type</th> <th>Approval status</th>";
			echo "</tr>";

			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			
			$id=$row['email'];

			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['mobile'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>" . $row['adminapprove'] . "</td>";
			
			// echo "<td><input name='reject[]' type='checkbox' value=".$id."><td>";
			echo "</tr>";
			}
			} else {
			echo "<strong>No approved application found.</strong>";
			}
        } 

        function notapproved() { 

            $servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);


            $sql = "SELECT name, email, mobile, address, usertype, adminapprove FROM project WHERE adminapprove = 'no' AND superadmin = '' ";
			$result = mysqli_query($conn, $sql);
			// echo mysqli_num_rows($result);
			echo "<table border='1' class='center'>";
			echo "<tr>";
			echo "<th> Name</th> <th>Email</th> <th>Mobile No.</th> <th>Address</th> <th>User Type</th> <th>Approval status</th>";
			echo "</tr>";

			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			
			$id=$row['email'];

			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['mobile'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>" . $row['adminapprove'] . "</td>";
			
			// echo "<td><input name='reject[]' type='checkbox' value=".$id."><td>";
			echo "</tr>";
			}
			} else {
			echo "<strong>No rejected application found.</strong>";
			}
        } 

        function dataView(){
        	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			$sql = "SELECT name, email, mobile, address, usertype FROM project WHERE (adminapprove IS NULL OR adminapprove = '') AND superadmin = '' AND usertype = 'Admin'";
			$result = mysqli_query($conn, $sql);
			// echo mysqli_num_rows($result);
			echo "<table border='1' class='center'>";
			echo "<tr>";
			echo "<th> Name</th> <th>Email</th> <th>Mobile No.</th> <th>Address</th> <th>User Type</th> <th>Select for approve</th>";
			echo "</tr>";

			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			
			$id=$row['email'];

			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['mobile'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>yes<input name='selector[]' type='checkbox' value=".$id."> no<input name='reject[]' type='checkbox' value=".$id."><td>";
			// echo "<td><input name='reject[]' type='checkbox' value=".$id."><td>";
			echo "</tr>";

			}
			} else {
			echo "<strong>No pending application found.</strong>";

			}
		}

		


    ?> 

  






<p style='position: relative; bottom: 0; width:100%; text-align: right'>To know about student's status please click <a href= 'adminpage.php'>here</a></p>







</body>
<html>



