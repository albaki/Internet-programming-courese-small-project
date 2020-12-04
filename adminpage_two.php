
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
  left: 46%;
}
.button {
  position: relative;
  top: -1%;
  left: 35%;
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
        echo "<h1 style='text-align:center'> Welcome to Student's Testimonial Approval Page </h1>";
        echo "<a href= 'logout.php'><button id='user_box'>Logout</button></a>";


        if(array_key_exists('approved', $_POST)) { 
            echo "This is the list of already approved testimonial applications"; 
        } 
        else if(array_key_exists('notapproved', $_POST)) { 
            echo "This is the list of rejected testimonial applications";
        } 
        else if (array_key_exists('pending', $_POST)){
        	echo "This is the list of pending testimonial applications";
        }
	} 
	else {
		header("location:login.php");
	}

?>




  <br><br>

    <form  method='post'> 
        <input type="submit" name="approved"
                class="button" value="Approved Applications" /> 
          
        <input type="submit" name="notapproved"
                class="button" value="Rejected Applications" /> 
        <input type="submit" name="pending"
                class="button" value="Pending Applications" /> 
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
        	echo "<input type='submit' class='b' value='Update pending' name='testimonial'>";
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


            $sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, todaysdate, applystatus, approvestatus FROM s_apply WHERE applystatus = 'applied' AND approvestatus = 'approved'";
			$result = mysqli_query($conn, $sql);
			
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


           $sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, todaysdate, applystatus, approvestatus FROM s_apply WHERE applystatus = 'applied' AND approvestatus = 'rejected'";
			$result = mysqli_query($conn, $sql);
			
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

			
           $sql = "SELECT name, email, mobile, address, usertype, fathername, mothername, degree, regno, todaysdate, applystatus FROM s_apply WHERE applystatus = 'applied' AND approvestatus = ''";
			$result = mysqli_query($conn, $sql);
			// echo mysqli_num_rows($result);
			echo "<table border='1' class='center'>";
			echo "<tr>";
			echo "<th> Name</th> <th>Email</th> <th>Mobile No.</th> <th>Address</th> <th>User Type</th> <th>Father's name</th> <th>Mother's name</th> <th>Last degree</th> <th>Registration No</th> <th>Date</th> <th>Application Status</th> <th>Approval Status</th>";
			echo "</tr>";

			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			
			$id=$row['email'];
			$d = $row['todaysdate'];


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
			echo "<td>yes<input name='selector[".$id."]' type='checkbox' value=".$d.">
			<input name='date[]' type='hidden' value=".$d.">
			 no<input name='reject[".$id."]' type='checkbox' value=".$d."><td>";
			// echo "<td><input name='reject[]' type='checkbox' value=".$id."><td>";
			echo "</tr>";
			}
			} else {
			echo "<strong>No pending application found.</strong>";
			}
		}

		


    ?>



<p style='position: relative; bottom: 0; width:90%; text-align: right'>To go back Student's System Access Page click <a href= 'adminpage.php' style='color: #00FFFF'>here</a></p>


</div>


</body>

</html>



