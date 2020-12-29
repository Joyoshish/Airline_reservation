<!--//header-->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.php" class="buses active"> <span>DB Airline</span></a>	
		</div>
		<div class="lock fadeInDown animated" data-wow-delay=".5s"> 
			<li><i class="fa fa-lock"></i></li>
            <li><div class="securetxt">SAFE &amp; SECURE<br> ONLINE PAYMENTS</div></li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--//Navbar-->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
								<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
			
				
							 </ul>
							<li><a href="about.html">About</a></li>
								<li><a href="faq.html">Faq</a></li>
							    <li><a href="contact.html">Contact Us</a></li>
								<li><a href="#"> Need Help? Write Us </a>  </li>
								<ul class="tp-hd-rgt wow fadeInRight animated"  > 
									<!-- <li class="tol">Contact:9933112299</li>	 -->		
									<?php 
										
										if(isset($_SESSION['loggedin']))
										{
											echo "<li><a href='mybookings.php'>My bookings</li>";
											echo "<li class='sig'>Welcome</li>";
											echo "<li class='sigi'><a href = 'signout.php'>Sign Out</a></li>"; 				
										}
										else
										{
											echo '<li class="sig"><a href="signup.php">Sign Up</a></li>'; 
											echo '<li class="sigi"><a href="signin.php">Sign In</a></li>';
										}
									
									?>
									
									
								</ul>
								<div class="clearfix"></div>
						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>