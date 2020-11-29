<?php

	session_start();
	session_destroy();
    
    echo "You have logged out. Please login again. </br>";
    echo '<a href="login.php"><button>Login Again</button></a>';
 ?>
