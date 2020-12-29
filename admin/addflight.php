<?php
	

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome! DB_Airline</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!--animate-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<style>
    form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #42aaf5;
  color:#fff;
  text-decoration:none;
  border:none;
  outline:none;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}


.no-arrow {
  -moz-appearance: textfield;
}
.no-arrow::-webkit-inner-spin-button {
  display: none;
}
.no-arrow::-webkit-outer-spin-button,
.no-arrow::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Add padding to containers */
.container {
  padding: 16px;
}



/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
</style>
</head>
<body>
<!--//header-->

<?php include "../include/header.php"; ?>

<form action="insert_in_schedule.php" method="post">

  <div class="container">
  	
  <h1>Flight Details</h1>
    <div>
    	<hr>
    	<b><h3>Flight</h3></b><br/><br/>
    	<div class="ban-top">
			<div class="bnr-left">
				<label for="fno">Flight Number</label>
    	<input type="text" placeholder="Enter flight number" name="fno" required>
			</div>
			<div class="bnr-left">
				<label for="src">Source</label>
    	<input type="text" placeholder="Enter source" name="src" required>
			</div>
			<div class="bnr-left">
				<label for="dest">Destination</label>
				<br><br>
    	<input style="font-size:14px;" type="text" placeholder="Enter destination" name="dest" required>
			</div>
			<div class="bnr-left">
				<b><p>Gender</p></b>
				<br/>
				<label for="Male">Male </label>
				<input id="Male" type="radio" name="gender1" value="Male" required>
				<label for="Female">Female </label>
				<input type="radio" id="Female" name="gender1" value="Female" required>
				<label for="Other">Non-Binary </label>
				<input id="Other" type="radio" name="gender1" value="Other" required>
	
			</div>
				<div class="clearfix"></div>
		</div>
    	
    </div>
    <div>
    	<hr>
    	<b><h3>Passenger 2</h3></b><br/><br/>
    	<div class="ban-top">
			<div class="bnr-left">
				<label for="fname">First Name</label>
    	<input type="text" placeholder="Enter First Name" name="fname2">
			</div>
			<div class="bnr-left">
				<label for="lname">Last Name</label>
    	<input type="text" placeholder="Enter Last Name" name="lname2">
			</div>
			<div class="bnr-left">
				<label for="age">Age</label>
				<br/><br/>
    	<input type="number" style="font-size: 14px;" placeholder="Enter passenger's age" name="age2">
			</div>
			<div class="bnr-left">
				<b><p>Gender</p></b>
				<br/>
				<label for="Male">Male </label>
				<input id="Male" type="radio" name="gender2" value="Male">
				<label for="Female">Female </label>
				<input type="radio" id="Female" name="gender2" value="Female">
				<label for="Other">Non-Binary </label>
				<input id="Other" type="radio" name="gender2" value="Other">
	
			</div>
				<div class="clearfix"></div>
		</div>
    </div>
    <div>
    	<hr>
    	<b><h3>Contact Details</h3></b><br/>
    	<div class="ban-top">
			<div class="bnr-left">
				<label for="phone">Mobile Number</label>
  				<input type="number" style="font-size: 14px;" placeholder="Enter Mobile Number" name="phone" class="no-arrow" required>
  
			</div>
			<div class="bnr-left">
				<label for="email ID">Email </label>
    			<input type="email" style="font-size: 14px;" placeholder="Enter Email ID" name="email" required>
			</div>
			<br>
				<div class="clearfix"></div>
		</div>
    </div>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span>
    	<label>
      		<input type="checkbox" checked="checked" name="T&C"> I understand and agree with the Rules and Regulations of DB Airlines
    	</label>
    </span>
    <br><br>
    <input type="submit" class="cancelbtn" value="Continue">
  </div>
</form>

<!--/footer-->
<?php include "../include/footer.php"; ?>
</body>
</html>