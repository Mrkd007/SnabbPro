<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index1.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);

 		$email1 = trim($_POST['email1']);
		$email1 = strip_tags($email1);
		$email1 = htmlspecialchars($email1);

		$message = trim($_POST['message']);
		$message = strip_tags($message);
		$message = htmlspecialchars($message);
 
   	$email_subject = "New User to Ride";

  	$to = "snabbpro@gmail.com";
 
  	$headers =$email1;
 	if ($_POST) {
  	if (mail($to,$email_subject,$message,$headers))
  	{

  	}
  }
  	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>SnabbPro</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="assets/css/bootstrap.mincss" type="text/css"  />
	<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<a href="index2.php" class="logo">SNABB PRO</a>
				<ul>
					<li class="selected">
						<a href="index2.php">home</a>
					</li>
					<li>
						<a href="about.php">about</a>
					</li>
					<li>
						<a href="rides.php">rides &amp; services</a>
					</li>
					<li>
						<a href="contact.php">contact</a>
					</li>
					<li class="dropdown">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
            		</li>
            		<li><a href="logout.php?logout">Sign Out</a></li>
				</ul>
			</div>
			<div id="body">
				<div id="figure">
					<img src="images/car2.png" alt=""> <img src="images/discounts.png" alt=""></a>
				</div>
				<div id="section">
					<h1>rides and services</h1>
					<div>
						<div class="article">
							<p>
								Are you waiting for a online cab service in your city then we are here to overcome the problem. We provide our facilities to you, not only inside the city but also all other nearby places. We also provide long tour facilities for needy consumers. So don't worry we are here to help you So just give a missed call to get your cab on your place within minutes.
							</p>
							<ul>
								<li>
									<a href="rides.html"><img src="images/rides11.jpg" alt=""></a> <span>Fastest service</span>
								</li>
								<li>
									<a href="rides.html"><img src="images/rides21.jpg" alt=""></a> <span>Safest service</span>
								</li>
							</ul>
						</div>
						<div class="aside">
							<!--<div>
								<h3>twitter updates</h3>
								<ul>
									<li>
										<p>
											<a href="#">&#64;SnabbPro</a> This is just a place holder, so you can see what the site would look like. Nov 2012
										</p>
									</li>
									<li>
										<p>
											<a href="#">&#64;SnabbPro</a> This is just a place holder, so you can see what the site would look like. Nov 2012
										</p>
									</li>
								</ul>
							</div>-->
							<div>
								<h3>get your cab</h3>
								<p>
									Mail your current address through given box or call us at +917549891680.
								</p>
								<form accept="?" method="post">
									<input type="email" name="email1" value="<?php echo $userRow['userEmail']; ?>" required="">
									<input type="text" name="message" placeholder="Enter your current address" required="">
									<button class="button1 button2"  type="submit" name="Subscribe" value="" required="">Send</button>								
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="footer">
				<div>
					<div>
						<h3>About</h3>
						<p>
							<a href="about.php"><span>Dec 2016</span> Try the best cab service in your city.</a>
						</p>
					</div>
					<div>
						<h3>categories</h3>
						<ul class="category">
							<li>
								<a href="index.html">home</a>
							</li>
							<li>
								<a href="about.html">about</a>
							</li>
							<li>
								<a href="rides.html">rides &amp; services</a>
							</li>
							<li>
								<a href="contact.html">contact</a>
							</li>
							
						</ul>
					</div>
					<div>
						<h3>connect</h3>
						<ul class="connect">
							<li id="facebook">
								<a href="https://www.facebook.com/Snabbpro/">facebook</a>
							</li>
							<li id="twitter">
								<a href="#">twitter</a>
							</li>
							<li id="googleplus">
								<a href="https://plus.google.com/u/2/">googleplus</a>
							</li>
						</ul>
					</div>
				</div>
				<p>
					@ all rights reserved by snabbPro.
				</p>
			</div>
		</div>
	</div>
</body>
</html>


<?php ob_end_flush(); ?>