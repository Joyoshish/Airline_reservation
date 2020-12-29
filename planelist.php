<?php
	
	session_start();
	
	$conn = mysqli_connect('localhost','root','','airline_reservation_database');
	if (!($conn)) 
	{
    	die("Connection failed: ");
	}
	function extractFare($scno,$conn)
	{
		$sql = "SELECT Fare from Schedule WHERE ScNo = '".$scno."'";
		$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		return $row['Fare'];
	}
	function fetchPlaneName($fno,$conn)
	{
		$sql = "SELECT Fname from flight WHERE FNo = '".$fno."'";
		$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		return $row['Fname'];
	}
	function extractSeats($scno,$fno,$conn)
	{
		// count no.of reserved seats on scno
		$sql = "SELECT SUM(Pcount) AS Seats FROM reservation WHERE ScNo = '".$scno."'";
		$reserved = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		
		// count total seats in that flight
		$sql = "SELECT Tseats FROM flight WHERE Fno = '".$fno."'";
		$total = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		return ($total['Tseats'] - $reserved['Seats']);
	}

	$src = "";
	$dest = "";
	$jrndate = "";
	$retdate = "";
	if(isset($_GET['src']))
		$src = $_GET['src'];
	if(isset($_GET['dest']))
		$dest = $_GET['dest'];
	if(isset($_GET['jrndate']))
		$jrndate = $_GET['jrndate'];
	if(isset($_GET['retdate']))
		$retdate = $_GET['retdate'];

		
	$flag=1;
	if($src!="" && $dest!="" && $jrndate!="" && $retdate=="dd-mm-yyyy")	// One way journey
	{

		
		$extractairportst = 'SELECT ANo FROM Airport WHERE AName = "'.$src.'"';
		$extractairportdest = 'SELECT ANo FROM Airport WHERE AName = "'.$dest.'"';
		$res = mysqli_query($conn,$extractairportst);
		while($row = mysqli_fetch_assoc($res))
			$srccode = $row['ANo'];
		

		$res = mysqli_query($conn,$extractairportdest);
		while($row = mysqli_fetch_assoc($res))
			$destcode = $row['ANo'];
		
		$sttimestamp = strtotime($jrndate);
		$endtimestamp = $sttimestamp + 86400;
		$extractscno = "SELECT * FROM schedule WHERE dept_timestamp > ".$sttimestamp." AND dept_timestamp < ".$endtimestamp." AND src = '".$srccode."' AND dest = '".$destcode."'";
		$scnos = array();
		$result = mysqli_query($conn,$extractscno);
		
	}
	else
	{
		$flag = 0;
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
		
		<h2><?php echo "Flights from ".$src." to ".$dest; ?></h2>
		<div class="clearfix"></div>
	</div>
</div>

<div class="bus-btm">
	<div class="container">
	
		<ul>
			<li class="trav"><a href="#">Flight</a></li>
			<li class="dept"><a href="#">Depart</a></li>
			<li class="arriv"><a href="#">Arrive</a></li>
			<li class="seat"><a href="#">Seats Available</a></li>
			<li class="fare"><a href="#">Fare</a></li>
			<li class="book"><a href="#">&emsp;</a></li>
				<div class="clearfix"></div>

		</ul>
		<ul>
			<li class="trav"><a href="#">&emsp;</a></li>
			<li class="dept"><a href="#">&emsp;</a></li>
			<li class="arriv"><a href="#">&emsp;</a></li>
			<li class="seat"><a href="#">&emsp;</a></li>
			<li class="fare"><a href="#">&emsp;</a></li>
			<li class="book"><a href="#">&emsp;</a></li>
				<div class="clearfix"></div>
				
		</ul>
		<?php
			
			if($flag == 1 && (mysqli_num_rows($result) > 0))
			{
				$i=0;
				$src1 = "'".$src."'";
				$dest1 = "'".$dest."'";
				while($row = mysqli_fetch_assoc($result))
				{
					$i++;
					$ulid = "'ulid".$i."'";
		?>
					<ul id = <?php echo $ulid; ?> >
						<li class="trav" ><?php echo fetchPlaneName($row['FNo'],$conn); ?></li>
						<li class="dept" style = "color: #9E9E9E;"><?php echo date('d/m/Y H:i:s',$row['dept_timestamp']); ?></li>
						<li class="arriv" style = "color: #9E9E9E;"><?php echo date('d/m/Y H:i:s',$row['arrival_timestamp']); ?></li>
						<li class="seat" style = "color: #9E9E9E;"><?php echo extractSeats($row['ScNo'],$row['FNo'],$conn); ?></li>
						<li class="fare" style = "color: #9E9E9E;"><?php echo extractFare($row['ScNo'],$conn); ?></li>
						<?php 
							if(isset($_SESSION['loggedin']))
							{
								echo '<li class="book"><button class = "button" type = "button"  onclick = "sendtobook('.$ulid.','.$src1.','.$dest1.','.$row['ScNo'].')">Book</button></li>';
							}
							else
							{
								echo '<li class="book"><button class = "button" type = "button" disabled style = "background:grey;">Book</button></li>';
							}
						?>
						<div class="clearfix"></div>
					
					</ul>	
		<?php
				}
			}
		?>
		
		
	</div>
</div>
<script>
	function sendtobook(x,src,dest,scno)
	{
		/*var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() 
		{
    	if (this.readyState == 4 && this.status == 200) 
			{
      	document.getElementById("demo").innerHTML = this.responseText;
    	}
  	};*/
		
		var elems = document.getElementById(x).getElementsByTagName("li");
		console.log(elems);
		var plane = elems[0].childNodes.item(0).nodeValue;
		var depttime = elems[1].childNodes.item(0).nodeValue;
		var arrivaltime = elems[2].childNodes.item(0).nodeValue;
		var fare = elems[4].childNodes.item(0).nodeValue;
		var s = "reservation.php?";
		s = s + "src="+src+"&dest="+dest+"&scno="+scno+"&planename="+plane+"&depttime="+depttime+"&arrivaltime="+arrivaltime+"&fare="+fare;
		location.href = s;
  	
	}
</script>
<!--/footer-->
<?php include "include/footer.php"; ?>
</body>
</html>

<?php mysqli_close($conn); ?>