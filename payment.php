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

<?php include "include/header.php"; ?>

  
  <div class="container">

    
    
  <h1>Payment Details</h1>
  <form  action = "index.php">
  <div>
      <hr>
      <b><h3>Credit Card/Debit Card</h3></b><br/><br/>
      <div class="ban-top">
      <div class="bnr-left">
        <label for="fname">Account Holder's Name</label>
      <input type="text" placeholder="Enter First Name" name="fname2">
      </div>
      
      
      
        
    </div>
      <div class="bnr-left">
    <label for="banks">Choose a bank:</label>
  <select id="banks" name="banks">
    <option value="SBI">SBI</option>
    <option value="HDFC">HDFC</option>
    <option value="BOB">BOB</option>
    <option value="PNB">PNB</option>
  </select>
</div>


    <br><br><br><br><br>
    <div>
      <hr>
      
      <div class="ban-top">
      <div class="bnr-left">
        <label for="fname">Card Number</label>
      <input type="number" placeholder="16 Digit Number" name="fname1" required><br><br>
      </div>
      <div class="bnr-left">
        <label for="lname">CVV Number</label>
      <input type="number" placeholder="CVV" name="lname1" required>
      </div>

      
      
        <div class="clearfix"></div>
    </div>
      
  </div>

      <br><br>

    <input type="submit"  value="Continue">
    <br><br>

  </form>

    

<!--/footer-->
<?php include "include/footer.php"; ?>
</body>
</html>