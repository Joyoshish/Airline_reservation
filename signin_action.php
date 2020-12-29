<?php

    session_start();
    if(isset($_SESSION['loggedin']))
    {
        echo "Sign out of the current account. <br>";
        echo "<a href = 'index.php'> Go to home page";
    }
    else
    {
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $conn = mysqli_connect('localhost','root','','airline_reservation_database');
	    if (!($conn)) 
	    {
    	    die("Connection failed: ");
        }
        $sql = "SELECT CNo,COUNT(*) AS C FROM customer WHERE Email = '".$username."' AND Password = '".$password."'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
		{
            
            if($row['C'] == 1)
            {
                $_SESSION['loggedin'] = 1;
                $_SESSION['CNo'] = $row['CNo'];
                echo "<script type='text/javascript'>location.href = 'index.php';</script>";
            }
            else
            {
                echo "Username and password combination did not match. <br>";
                echo "<a href = 'signin.php'> Go to login page";
            }
		}
    }
?>