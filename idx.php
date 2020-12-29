<?php
	
	session_start();
	$conn = mysqli_connect('localhost','root','','airline_reservation_database');
	if (!($conn)) 
	{
    	die("Connection failed: ");
	}	 
	
	$sql = "SELECT AName FROM airport";
	$result = mysqli_query($conn,$sql);
	$airports = array();
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($airports,$row['AName']);
		}
	}
	mysqli_close($conn);

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
</head>
<body>
<!-- header start -->
	<?php include "include/header.php"; ?>
<!-- header end -->


<!--/banner-->
<div class="banner">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> BEC Flights - Best in Class for Flight Bookings</h1>
	</div>
</div>
<div class="container">
	<div class="col-md-5 bann-info1 wow fadeInLeft animated" data-wow-delay=".5s">
		<i class="fa fa-columns"></i>
		<h3>WORLD'S MOST TRUSTED AIRLINE RESERVATION BRAND</h3>
	</div>
	<form action = "planelist.php">
	<div class="col-md-7 bann-info wow fadeInRight animated" data-wow-delay=".5s">
		<h2>Online Tickets with Zero Booking Fees</h2>
		
		<div class="ban-top">
			<div class="bnr-left">
				<label class="inputLabel">From </label>
				<input list = "source" name="src" placeholder = 'Enter city'>
				<datalist id = "source">
					<?php
						for($i=0;$i<count($airports);$i++)
						{
							echo '<option value="'.$airports[$i].'">';
						}
					?>
				</datalist>
			</div>
			<div class="bnr-left">
				<label class="inputLabel">To</label>
				<input list = "dest" name="dest" placeholder = 'Enter city'>
				<datalist id = "dest">
					<?php
						for($i=0;$i<count($airports);$i++)
						{
							echo '<option value="'.$airports[$i].'">';
						}
					?>
				</datalist>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="ban-bottom">
			<div class="bnr-right">
				<label class="inputLabel">Date of Journey</label>
				<input class="date" name = "jrndate" id="datepicker" type="text" value="dd-mm-yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'dd-mm-yyyy';}" >
			</div>
			<div class="bnr-right">
				<label class="inputLabel">Date of Return<span class="opt">&nbsp;(Optional)</span></label>
				<input class="date" name = "retdate" id="datepicker1" type="text" value="dd-mm-yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'dd-mm-yyyy';}">
			</div>
				<div class="clearfix"></div>
				<!---start-date-piker---->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
			<!---/End-date-piker---->
		</div>
		<div class="sear">
			<button class="seabtn">Search Flights</button>
		</div>
	</div>
	</form>
	<div class="clearfix"></div>
</div>
<!--/footer-->
<?php include "include/footer.php"; ?>
</body>
</html>