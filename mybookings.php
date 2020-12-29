<?php
	
	session_start();
	
	$conn = mysqli_connect('localhost','root','','airline_reservation_database');
	if (!($conn)) 
	{
    	die("Connection failed: ");
    }
    $timestamp = time();
    $pastbookings = "SELECT * FROM reservation INNER JOIN schedule ON reservation.scno = schedule.scno WHERE reservation.CNo = '".$_SESSION['CNo']."' AND schedule.dept_timestamp < '".$timestamp."'";
    $pastresult = mysqli_query($conn,$pastbookings);
    $futurebookings = "SELECT * FROM reservation INNER JOIN schedule ON reservation.scno = schedule.scno WHERE reservation.CNo = '".$_SESSION['CNo']."' AND schedule.dept_timestamp > '".$timestamp."'";
    $futureresult = mysqli_query($conn,$futurebookings);

    function extractAirports($conn,$code)
    {
        $sql = 'SELECT AName FROM Airport WHERE ANo = "'.$code.'"';
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res))
            $srccode = $row['AName'];
        
        return $srccode;
    }
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
.book .cancel {
  background-color: red;
  border: none;
  color: white;
  padding: 5px 11px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 0px 2px 4px 2px;
  
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
		
		<h2>All bookings</h2>
		<div class="clearfix"></div>
	</div>
</div>

<div class="bus-btm">
	<div class="container">
	
		<ul>
			<li class="trav"><a href="#">Ticket No.</a></li>
			<li class="dept"><a href="#">Boarding</a></li>
			<li class="arriv"><a href="#">Destination</a></li>
			<li class="fare"><a href="#">Fare</a></li>
			<li class="view"><a href="#">&emsp;</a></li>
            <li class="cancel"><a href="#">&emsp;</a></li>
			<div class="clearfix"></div>

		</ul>
		<ul>
			<li class="trav"><a href="#">&emsp;</a></li>
			<li class="dept"><a href="#">&emsp;</a></li>
			<li class="arriv"><a href="#">&emsp;</a></li>
			<li class="fare"><a href="#">&emsp;</a></li>
			<li class="view"><a href="#">&emsp;</a></li>
            <li class="cancel"><a href="#">&emsp;</a></li>
			<div class="clearfix"></div>
				
		</ul>
		<?php
			
			
				$i=0;
				while($row = mysqli_fetch_assoc($pastresult))
				{
					$i++;
					$ulid = "'ulid".$i."'";
		?>
					<ul id = <?php echo $ulid; ?> >
						<li class="trav" ><?php echo $row['TNo']; ?></li>
						<li class="dept" style = "color: #9E9E9E;"><?php echo extractAirports($conn,$row['src']);?></li>
						<li class="arriv" style = "color: #9E9E9E;"><?php echo extractAirports($conn,$row['dest']) ?></li>
						<li class="fare" style = "color: #9E9E9E;"><?php echo $row['Fare'];?></li>
                        <li class="view"><a href="#">&emsp;</a></li>
                        <li class="Cancel"><a href="#">&emsp;</a></li>
						<?php 
							echo '<li class="book"><button class = "button" type = "button"  onclick = "sendtoview('.$ulid.','.$row['TNo'].')">View</button></li>';
							echo '<li class="book"><button class = "cancel" type = "button"  onclick = "sendtocancel('.$ulid.','.$row['TNo'].')">Cancel</button></li>';
						?>
						<div class="clearfix"></div>
					
					</ul>	
		<?php
                }
                while($row = mysqli_fetch_assoc($futureresult))
                {
                    $i++;
                    $ulid = "'ulid".$i."'";
                
		?>      
                    
                    <ul id = <?php echo $ulid; ?> >
						<li class="trav" ><?php echo $row['TNo']; ?></li>
						<li class="dept" style = "color: #9E9E9E;"><?php echo extractAirports($conn,$row['src']);?></li>
						<li class="arriv" style = "color: #9E9E9E;"><?php echo extractAirports($conn,$row['dest']) ?></li>
						<li class="fare" style = "color: #9E9E9E;"><?php echo $row['Fare'];?></li>
                        <li class="view"><a href="#">&emsp;</a></li>
                        <li class="cancel"><a href="#">&emsp;</a></li>
						<?php 
                            echo '<li class="book"><button class = "button" type = "button"  onclick = "sendtoview('.$ulid.','.$row['TNo'].')">View</button></li>';
                            echo '<li class="book"><button class = "cancel" type = "button"  onclick = "sendtocancel('.$ulid.','.$row['TNo'].')">Cancel</button></li>';
						?>

						<div class="clearfix"></div>
					
					</ul>
        <?php
                }
        ?>
		
	</div>
</div>
<script>
	function sendtoview(x,tno)
	{	
		var s = "viewticket.php?";
		s = s + "tno="+tno;
		location.href = s;
  	
	}
    function sendtocancel(x,tno)
    {
        var s = "cancelticket.php?";
		s = s + "tno="+tno;
		location.href = s;
    }
</script>
<!--/footer-->
<?php include "include/footer.php"; ?>
</body>
</html>

<?php mysqli_close($conn); ?>