<?php

    session_start();
    $tno = $_GET['tno'];
    $fp = fopen("tickets/".$tno.".json","r");
    $json = file_get_contents("tickets/".$tno.".json");
    $array = json_decode($json, true);
    
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Welcome! DB_Airline</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<style>
.book .button {
  background-color: #34ad00;
  border: none;
  color: white;
  padding: 5px 11px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 0px 2px 4px 2px;
  
}
td
{
    min-width:150px;
    padding:10px 20px;
    margin:5px 0px;
}
</style>
</head>
<body>
<!--//header-->
<?php include "include/header.php"; ?>


<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Book all National and International flight with us!</h1>
	</div>
</div>

<div class="bus-tp">
	<div class="container">
		
		<h2>Ticket</h2>
		<div class="clearfix"></div>
	</div>
</div>
<div>
    <table>
        <tr>
            <td>Ticket No.</td>
            <td><?php echo $array[0]['tno']; ?></td>
        </tr>
        <tr>
            <td>Source</td>
            <td><?php echo $array[0]['source']; ?></td>
        </tr>
        <tr>
            <td>Destination</td>
            <td><?php echo $array[0]['destination']; ?></td>
        </tr>
        <tr>
            <td>Flight Name</td>
            <td><?php echo $array[0]['flight name']; ?></td>
        </tr>
        <tr>
            <td>Departure Time</td>
            <td><?php echo $array[0]['departure']; ?></td>
        </tr>
        <tr>
            <td>Arrival Time</td>
            <td><?php echo $array[0]['arrival']; ?></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><?php echo $array[0]['contact number']; ?></td>
        </tr>
        <tr>
            <td>Email Id</td>
            <td><?php echo $array[0]['email']; ?></td>
        </tr>
        <tr>
            <td>Offers</td>
            <td><?php echo $array[0]['offers']; ?></td>
        </tr>
        <tr>
            <td>&emsp;</td>
            <td>&emsp;</td>
        </tr>
        <tr>
            <td>First name</td>
            <td>Last name</td>
            <td>Age</td>
            <td>Gender</td>
        </tr>
        
        <?php
            for($i=0;$i<count($array[0]['passengers']);$i++)
            {
        ?>
        <tr>
            <td><?php echo $array[0]['passengers'][$i]['fname'];?></td>
            <td><?php echo $array[0]['passengers'][$i]['lname'];?></td>
            <td><?php echo $array[0]['passengers'][$i]['age'];?></td>
            <td><?php echo $array[0]['passengers'][$i]['gender'];?></td>
        </tr>
            <?php } ?>
    </table>    
</div>

<!--/footer-->
<?php include "include/footer.php"; ?>
</body>
</html>