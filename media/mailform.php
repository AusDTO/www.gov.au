<?php
//this script runs the  "Contact Us" page's feedback form
// updated dec07  added  'ereg( "[\r\n]", $email' check and updated email layout + added IP address grabbing
// created by Tim Hurley  - Nov2007  (timothy.hurley@finance.gov.au)


	if (strpos($_SERVER["HTTP_REFERER"], "gov.au/contact.html") === false) {	//make sure feedback is being sent from gov.au domain, and from the contact.html page
		header("Location: /");
		exit();
	}

	//define vars
	$email = htmlentities(str_replace(" ", "", $_POST['email'])); 
	$subject = "www.gov.au - 'Contact Us' form";
	$feedback = htmlentities(trim($_POST['feedback']));
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	$usrAgent = $_SERVER['HTTP_USER_AGENT'];
	
	//compose email
	$message = $email . "\n\n\n" . $feedback . "\n\n------------------------\n\nIP: " . $ipAddress . "\n" . $usrAgent;
	
	if (strpos($email, "\\r") !== false || 
		strpos($email, "\\n") !== false || 
		strpos($email, ":") !== false) {

		header("Location: /");
		exit();
	}
	
	if (!$feedback) {	// if feedback form is empy, send them back to contact us page. dont send email.
		header("Location: /contact.html");
		exit();
	}
	
	//send email
	@mail( "gov@agimo.gov.au", "$subject", "$message", "From: $email" );
	
	
//writes page  (match the look&feel of site)  with a message saying feedback sent
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Feedback - www.gov.au</title>
<style type="text/css" media="screen">@import "../media/css/screen.css";</style>
<!--[if IE]><style type="text/css" media="screen">@import "../media/css/ie.css";</style><![endif]-->
<!--[if gte IE 7.0]><style type="text/css" media="screen">@import "../media/css/ie7.css";</style><![endif]-->
<script type="text/javascript" src="../media/javascript/nav.js"></script>
</head>

<body>
	<div id="header">
		<h1 class="accessibility">www.gov.au</h1>
		<a href="../index.html"><img id="siteName" src="../media/images/www.gif" alt="www.gov.au"/></a>
		<div id="fadeDiv"></div>
		<div id="mainNav">
		<ul>
			<li><a href="../index.html">Home</a><span>&nbsp;</span></li>
			<li><a href="../contact.html">Contact us</a><span>&nbsp;</span></li>
			<li><a href="../help.html">Help</a><span>&nbsp;</span></li>
			<li><a href="../about.html">About the site</a></li>
		</ul>
		</div>
		<div class="floatFix"></div>
	</div><!-- Header -->

	<div>
		<div id="navigation">
			<h2 class="accessibility">Government Navigation Selection</h2>
			<div id="outerCircleDiv">
				<div id="circleDiv"></div><!-- CircleDiv -->
			</div><!-- outerCircleDiv -->
			<ul>
				<li><a href="http://www.australia.gov.au/" onfocus="javascript: replaceImage(0);" onmouseover="javascript: replaceImage(0);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Australian Federal Government">Australian Government</a></li>
				<li><a href="http://www.act.gov.au/" onfocus="javascript: replaceImage(1);" onmouseover="javascript: replaceImage(1);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Australian Capital Territory">Australian Capital Territory</a></li>
				<li><a href="http://www.nsw.gov.au/" onfocus="javascript: replaceImage(2);" onmouseover="javascript: replaceImage(2);"  onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="New South Wales">New South Wales</a></li>
				<li><a href="http://www.nt.gov.au/" onfocus="javascript: replaceImage(3);" onmouseover="javascript: replaceImage(3);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Northern Territory">Northern Territory</a></li>
				<li><a href="http://www.qld.gov.au/" onfocus="javascript: replaceImage(4);" onmouseover="javascript: replaceImage(4);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Queensland">Queensland</a></li>
				<li><a href="http://www.sa.gov.au/" onfocus="javascript: replaceImage(5);" onmouseover="javascript: replaceImage(5);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="South Australia">South Australia</a></li>
				<li><a href="http://www.tas.gov.au/" onfocus="javascript: replaceImage(6);" onmouseover="javascript: replaceImage(6);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Tasmania">Tasmania</a></li>
				<li><a href="http://www.vic.gov.au/" onfocus="javascript: replaceImage(7);" onmouseover="javascript: replaceImage(7);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Victoria">Victoria</a></li>
				<li><a href="http://www.wa.gov.au/" onfocus="javascript: replaceImage(8);" onmouseover="javascript: replaceImage(8);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Western Australia">Western Australia</a></li>
				<li><a href="http://www.alga.asn.au/links/obc.php" onfocus="javascript: replaceImage(9);" onmouseover="javascript: replaceImage(9);" onblur="javascript: replaceImage(-1);" onmouseout="javascript: replaceImage(-1);" title="Australian Local Government">Australian Local Government</a></li>
			</ul>
		</div><!-- navigation -->
		<div id="content">
			<div id="contentText">
				<h3>Thank you for your feedback.</h3>
				<p>We will endeavour to reply as soon as possible</p>
				<p><a href="../index.html">Back to the Home Page</a></p>
			</div><!-- contentText -->
		</div><!-- content -->
		<div class="floatFix"></div>
	</div>	

	<div id="footer">
		<div id="copyright">
			<p><a href="../copyright.html">&copy; 2007</a></p>
		</div>

		<ul id="footerLinks">
			<li><a href="../copyright.html">Copyright Notice</a><span>&nbsp;</span></li>
			<li><a href="../privacy.html">Privacy Notice</a><span>&nbsp;</span></li>
			<li><a href="../disclaimer.html">Disclaimer</a><span>&nbsp;</span></li>
			<li><a href="../policy.html">Information Governance Policy</a></li>
		</ul>
	</div><!-- footer -->
</body>
</html>