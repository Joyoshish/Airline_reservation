<?php

    session_start();
	$conn = mysqli_connect('localhost','root','','airline_reservation_database');
	if (!($conn)) 
	{
    	die("Connection failed: ");
	}	
    $tno = $_GET['tno'];
    $fp = fopen("tickets/".$tno.".json","r");
    $json = file_get_contents("tickets/".$tno.".json");
    $array = json_decode($json, true);
    $TNO = $array[0]['tno'];

    $sql = "DELETE FROM reservation WHERE tno=$TNO";

    if ($conn->query($sql) === TRUE) {
 		 echo "<script>location.href = 'mybookings.php';</script>";
	}
    
?>