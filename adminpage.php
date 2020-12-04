
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

    .bg {

      background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/TSC%2Clawn.jpg/1920px-TSC%2Clawn.jpg') no-repeat;
        width: 100%;
        height: 100vh;
        color: white;
        font-weight: bold;
    }

    .background{
    	background-color: black;
    	background-size: cover;
	    position: absolute;
	    top: -10px;
	    right: -10px;
	    bottom: -40px;
	    left: -10px;
	    opacity: 0.6;

    }


</style>

</head>
<body class="bg">

	<div class="background">


<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
	session_start();

	if(isset($_SESSION['email']) && isset($_SESSION['pass'])){
        echo "<h1 style='text-align:center'> Welcome to Student's System Access Page</h1>";
        echo "<a href= 'logout.php'><button id='user_box'>Logout</button></a>";


        if(array_key_exists('approved', $_POST)) { 
            echo "This is the list of already approved system access"; 
        } 
        else if(array_key_exists('notapproved', $_POST)) { 
            echo "This is the list of rejected system access";
        } 
        else if (array_key_exists('pending', $_POST)){
        	echo "This is the list of pending system access";
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

        	
        	echo "<form method='post' action='updatenewstudent.php'>";
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


            $sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, studentapprove FROM project WHERE studentapprove = 'ok' AND superadmin = '' ";
			$result = mysqli_query($conn, $sql);
		
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
			echo "<td>" . $row['studentapprove'] . "</td>";
			
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


            $sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, studentapprove FROM project WHERE studentapprove = 'no' AND superadmin = '' ";
			$result = mysqli_query($conn, $sql);

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
			echo "<td>" . $row['studentapprove'] . "</td>";
			
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

			$sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, studentapprove FROM project WHERE (studentapprove IS NULL OR studentapprove = '') AND usertype = 'Student' ";
			$result = mysqli_query($conn, $sql);

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
			echo "</tr>";
			}
			} else {
			echo "<strong>No pending application found.</strong>";
			}
		}



    ?> 

  



    <p style='position: relative; bottom: 0; width:90%; text-align: right'> Assess all testimonial applications <a href= 'adminpage_two.php' style='color: #00FFFF'>here</a> </p>
   
<?php
		
		$Email = (string) $_SESSION['email'];


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$sqlsuperadmin = "SELECT * FROM project WHERE email='$Email' AND superadmin = 'ok'";
		$resultSuperAdmin = mysqli_query($conn, $sqlsuperadmin);
		$countSuperAdmin = mysqli_num_rows($resultSuperAdmin);

		
		if($countSuperAdmin == 1){
			echo "<p style='position: relative; bottom: 0; width:90%; text-align: right'> To go back Super Admin Page click <a href= 'superadminpage.php' style='color: #00FFFF'>here</a> </p>";
			}

?>

    



</div>


</body>
<html>



