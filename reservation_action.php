<?php
    
    session_start();
    
    
    $tno = strval(time())."".strval($_SESSION['CNo']);
    // first passenger
    $key = array('fname','lname','age','gender');
    $passenger1 = array($_POST['fname1'],$_POST['lname1'],$_POST['age1'],$_POST['gender1']);
    $records[] = array_combine($key,$passenger1);
    $count = 1;

    //second passenger
    $fname2 = "";
    $lname2 = "";
    $age2 = "";
    $gender2 = "";
    $flag=0;
    if(isset($_POST['fname2']) && strlen($_POST['fname2']) > 0)
    {
        
        $fname2 = $_POST['fname2'];
        $flag=1;
    }
    if(isset($_POST['lname2']) && strlen($_POST['lname2']) > 0)
    {

        $lname2 = $_POST['lname2'];
        $flag=1;
    }
    if(isset($_POST['age2']) && strlen($_POST['age2']) > 0)
    {
        $age2 = $_POST['age2'];
        $flag=1;
    }
        
    if(isset($_POST['gender2']) && strlen($_POST['gender2']) > 0)
    {
        $gender2 = $_POST['gender2'];
        $flag=1;
    }
    if($flag==1)
    {
        $count++;
        $temp = (int)($_SESSION['ticketinfo'][5]);
        $temp = $temp*2;
        $_SESSION['ticketinfo'][5] = strval($temp);
        $passenger2 = array($fname2,$lname2,$age2,$gender2);
        array_push($records,array_combine($key,$passenger2));
    }
    $ticketdetails = $_SESSION['ticketinfo'];
    //unset($_SESSION['ticketinfo']);
    
    
    //convert to JSON
    $finalJSONkey = array('tno','source','destination','flight name','departure','arrival','fare','contact number','email','passengers','offers');
    $finalJSONarray = array($tno,$_SESSION['ticketinfo'][0],$_SESSION['ticketinfo'][1],$_SESSION['ticketinfo'][2],$_SESSION['ticketinfo'][3],$_SESSION['ticketinfo'][4],$_SESSION['ticketinfo'][5],$_POST['phone'],$_POST['email'],$records,$_POST['offers']);
    $finalJSON[]=array_combine($finalJSONkey,$finalJSONarray);
    $json = json_encode($finalJSON);
    
    //store in a file
    $fp = fopen("tickets/".$tno.".json","w");
    fwrite($fp,$json);
    fclose($fp);

    //store in reservation table

    $conn = mysqli_connect('localhost','root','','airline_reservation_database');
	if (!($conn)) 
	{
    	die("Connection failed: ");
    }
    
    $sql = "INSERT INTO Reservation (TNo, ScNo,CNo,Pcount,offers) VALUES('".$tno."','".$_SESSION['scno']."','".$_SESSION['CNo']."','".$count."','".$_POST['offers']."')";
    if(!mysqli_query($conn,$sql))
    {
        echo "error";
    }
    mysqli_close($conn);
    echo "<script>location.href = 'payment.php';</script>";
?>

