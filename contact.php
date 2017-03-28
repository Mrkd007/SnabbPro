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

		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$subject = trim($_POST['subject']);
		$subject = strip_tags($subject);
		$subject = htmlspecialchars($subject);

		$message = trim($_POST['message']);
		$message = strip_tags($message);
		$message = htmlspecialchars($message);

		$message1= "Hey Snabbpro I am ".$name." want to tell you :- ".$message;
 

  	$to = "snabbpro@gmail.com";
 
  	$headers =$email;
 	if ($_POST) {
  	if (mail($to,$subject,$message1,$headers))
  	{

  	}
  }
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>Contact SnabbPro</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="assets/css/bootstrap.mincss" type="text/css"  />
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<a href="index2.php" class="logo">snabb pro</a>
				<ul>
					<li>
						<a href="index2.php">home</a>
					</li>
					<li>
						<a href="about.php">about</a>
					</li>
					<li>
						<a href="rides.php">rides &amp; services</a>
					</li>
					<li class="selected">

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
				<div id="contact">
					<h1 allignment="middle">We provide 24x7 facilities to contact us "We are here to Help you".</h1>
					<div>
						<div class="figure">
							<img src="images/24x71.png" alt="">
							<p>
								Use our Helpline service anywhere anytime
							</p>
						</div>
						<div class="section">
							<p>
								We provide our best members to resolve all type of problems regarding our services. You can contact us anytime with the following information given below. Feel free to say anything if our drivers created anything unauspicious to you or if he missbehave to you or else if you dislike anything about us. We assure you will never face such problems.
							</p>
							<ul>
								<li>
									<span>location</span> <br><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d28721.91394911393!2d85.78363626847717!3d25.861602163164076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1478983499163" width="500" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
								</li>
								<li>
									<span>Email</span> <a href="http://">snabbpro@hotmail.com</a>
								</li>
								<li>
									<span>call</span> +91 754 989 1680<br> +91 700 844 1938
								</li>
								<li>
									<span>office</span> Samastipur, Bihar
								</li>
							</ul>
						</div>
					</div>
					<form action="?" method="post">
						<span>send a message</span>
						<div class="information">
							<label for="name">your name:</label>
							<input type="text" name="name" id="name" value="" required="">
							<label for="email">email address:</label>
							<input type="email" name="email" id="email" value="" required="">
							<label for="subject">subject:</label>
							<input type="text" name="subject" id="subject" required="">
						</div>
						<div>
							<label for="message">message:</label>
							<textarea name="message" id="message"></textarea>
							<input type="submit" name="send" id="send" value="" required="">
						</div>
					</form>
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