<?php

	session_start();
	session_destroy();
    
    echo "You have logged out. Please login again. </br>";
    echo "<script>document.location='http://localhost/IITProject/login.php'</script>";
 ?>
