<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index2.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing using SHA256
		
			$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: index2.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>


<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>SnabbPro</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style1.css">
</head>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<a href="index.html" class="logo">SNABB PRO</a>
				<ul>
					<li class="selected">
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
					<li>
						<div id="wrap">
						  	<div id="regbar">
						    	<div id="navthing">
						      		<a href="#" id="registerform">Register</a><br>
						    		<div class="register">
						        		<div class="arrow-up"></div>
						      			<div class="formholder">
						        			<div class="randompad">
									           	<fieldset>
									           	 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

									           	 		<?php
														if ( isset($errMSG) ) {
															
															?>
															<div class="form-group">
											            	<div class="alert alert-danger">
															<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
											                </div>
											            	</div>
											                <?php
														}
														?>
										            <label name="email">Email</label>
										            <input type="email" value="example@example.com" />
										            <label name="password">Password</label>
										            <input type="password" />
										            <input type="submit" value="Login" />
										          </form>
										        </fieldset>
						        			</div>
						      			</div>
						    		</div>
						    	</div>
						  	</div>
						</div>
					</li>
					<li>
						<div id="wrap">
						  	<div id="regbar">
						    	<div id="navthing">
						      		<a href="#" id="loginform">logIn</a><br>
						    		<div class="login">
						        		<div class="arrow-up"></div>
						      			<div class="formholder">
						        			<div class="randompad">
									           	<fieldset>
									           	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

									           	 		<?php
														if ( isset($errMSG) ) {
															
															?>
															<div class="form-group">
											            	<div class="alert alert-danger">
															<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
											                </div>
											            	</div>
											                <?php
														}
														?>
										            <label name="email">Email</label>
										            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
										            <span class="text-danger"><?php echo $emailError; ?></span>
										            <label name="password">Password</label>
										            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
										            <span class="text-danger"><?php echo $passError; ?></span>
										            <input type="submit" class="btn btn-block btn-primary" value="Login" name="btn-login"/>
										            <div class="form-group">
										            	<br> <br>
										            </div>
										            
										            <div class="form-group">
										            	<a href="register.php">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sign Up Here...</a>
										            </div>
										           </form>
										        </fieldset>
						        			</div>
						      			</div>
						    		</div>
						    	</div>
						  	</div>
						</div>	
					</li>
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
								<form action="index1.php">
									<input type="email" name="email1" value="" placeholder="Enter your email" required="">
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
							<a href="about.html"><span>Dec 2016</span> Try the best cab service in your city.</a>
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
							<li>
								<a href="register.php">register</a>
							</li>
							<li>
								<a href="index1.php">logIn</a>
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


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>


</body>
</html>
<?php ob_end_flush(); ?>