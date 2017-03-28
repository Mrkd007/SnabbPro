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
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>Rides and Srvices</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="assets/css/bootstrap.mincss" type="text/css"  />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<a href="index2.php" class="logo">Snabb Pro</a>
				<ul>
					<li>
						<a href="index2.php">home</a>
					</li>
					<li>
						<a href="about.php">about</a>
					</li>
					<li class="selected">
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
				<div id="content">
					<div class="section">
						<h2>What we provide to our Customers</h2>
						<ul>
							<li>
								<a href="#"><img src="images/aaa.jpg" alt=""></a>
							</li>
							<li>
								<a href="#"><img src="images/cs.jpg" alt=""></a>
							</li>
							<li>
								<a href="#"><img src="images/sf.jpg" alt=""></a>
							</li>
						</ul>
						<p>
							We provide a new generation online cab service which is not only the 24x7 but also provide a safest &amp; fastest service to our Customers. You can call our cab anywhere anytime in our city, we also try our best to reach to you as soon as possible. We also provide extra transportation facilities according to demand of our Customers. So seek SnabbPro more and more so that we extend our service all over the state and provide a better facility. 
						</p>
					</div>
					<div class="gallery">
						<ul>
							<li>
								<a href="#"><img src="images/rides1.jpg" alt=""></a> <span><a href="#">Fastest service</a></span>
							</li>
							<li>
								<a href="#"><img src="images/rides2.jpg" alt=""></a> <span><a href="#">Safest service</a></span>
							</li>
						</ul>
						<p>
							Are you waiting for a online cab service in your city then we are here to overcome the problem. We provide our facilities to you, not only inside the city but also all other nearby places. We also provide long tour facilities for needy consumers. So don't worry we are here to help you So just give a missed call to get your cab on your place within minutes. For other transportation services you can contact us with our 24x7 Helpline service.
						</p>
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