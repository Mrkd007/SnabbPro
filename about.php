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
	<title>About SnabbPro</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="assets/css/bootstrapmin.css" type="text/css"  />
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
					<li class="selected">
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
				<div id="content">
					<ul id="article">
						<li>
							<h3>From the Founders Desk</h3><br><br>
							<a href="https://www.facebook.com/Kunwar0003?ref=bookmarks"><img src="images/founder1.jpg" alt=""></a><br><br>
							<span class="aman1"><h4><a href="https://www.facebook.com/Kunwar0003?ref=bookmarks" >Aman Prasad Kunwar</a></h4></span>
							<span class="aman2"><a href="https://www.facebook.com/Kunwar0003?ref=bookmarks" >(ceo,SnabbPro)</a></span><br><br><br><br>
							<p>
								<b>Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What’s more, they’re absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms">Terms of Use</a>. You can even remove all our links if you want to.</b>
							</p>
							<p>
								Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What’s more, they’re absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms">Terms of Use</a>. You can even remove all our links if you want to.
							</p>
						</li>
					<!--	<li>
							<h3>We Have More Templates for You</h3>
							<p>
								<b>Looking for more templates? Just browse through all our <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> and find what you’re looking for. But if you don’t find any website template you can use, you can try our <a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a> service and tell us all about it. Maybe you’re looking for something different, something special. And we love the challenge of doing something different and something special.</b>
							</p>
							<p>
								Looking for more templates? Just browse through all our <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> and find what you’re looking for. But if you don’t find any website template you can use, you can try our <a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a> service and tell us all about it. Maybe you’re looking for something different, something special. And we love the challenge of doing something different and something special.
							</p>
						</li>
						<li>
							<h3>Be Part of Our Community</h3>
							<p>
								If you’re experiencing issues and concerns about this website template, join the discussion on <a href="http://www.freewebsitetemplates.com/forums/">on our forum</a> and meet other people in the community who share the same interests with you.
							</p>
						</li> -->
					</ul>
					<!--<div id="sidebar">
						<div>
							<h3>template details</h3>
							<p>
								Design version 4
							</p>
							<p>
								Code version 2
							</p>
							<p>
								Website Template details, discussion and updates for this <a href="http://www.freewebsitetemplates.com/discuss/amusementparkwebsitetemplate/">Amusement Park Website Template</a>. Website Template design by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a>.
							</p>
							<p>
								Please feel free to remove some or all the text and links of this page and replace it with your own About content
							</p>
						</div>
					</div>-->
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