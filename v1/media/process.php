<?php
	// rewritten by Tim Hurley(timothy.hurey@finance.gov.au)
	// change history:
	//	major clean up
	//	071031 - removed  session id references - not needed
	//	added  htmlentities & trim to  processData function
	

	// rewritten by Michael Tran (michael.tran@agimo.gov.au)
	// change history:
	//	061107 - comments now strip out \n \r ^
	// 	050705 - added DATE^IP_ADDRESS^ to stats header
	//	050620 - creation

	// turn off any error reporting
	error_reporting(0);
	
	// define our constants
	//define("SITE_LOCATION", "www.gov.au");
	define("SITE_LOG_LOCATION", "/var/log/apache/www.gov.au/survey/");
	
	if (strpos($_SERVER["HTTP_REFERER"], ".gov.au/survey.html") === false) {
		header("Location: /");
		exit;
	}
	
	function safewrite($filename, $data)
	{
		$err = 0;
		ignore_user_abort(true); // To solve most quit writing to my file and messed it up problems 
		// Each new month a new file is created. Insert the column headings at the start of the file to maximise usabability.
		if (@filesize(SITE_LOG_LOCATION . $filename) == 0) {
			$otw = fopen(SITE_LOG_LOCATION . $filename, "a");
			//$header = "DATE^SEARCH RESULTS^SEARCH EXPERIENCE^USABILITY^SITE DESIGN^COMMENTS\n";
			$header = "DATE^IP_ADDRESS^COUNTRY_ORIGIN^POSTCODE^USAGE_PURPOSE^ACCESSED_FROM^FOUND_BY^USAGE_INTEREST^GENDER^AGE_GROUP^INTERNET_ACCESS^COMMENTS\n";

			if(flock($otw, LOCK_EX)) {
				if(!fwrite($otw, $header)) $err = 1;
				flock($otw, LOCK_UN);
				fclose($otw);
			} 
			else {
				$err = 1;
			}
			if($err == 1) {
				 die;
			} 
		}

		// write $data to file
		$otw = fopen(SITE_LOG_LOCATION . $filename, "a");
		if(flock($otw, LOCK_EX)){
			if(!fwrite($otw, $data)) $err = 1;
			flock($otw, LOCK_UN);
			fclose($otw);
		} else {
			$err = 1;
		}
		if($err == 1) {
			die;
		} 
		ignore_user_abort(false); // To solve most quit writing to my file and messed it up problems 
	}	

	
	function processData()
	{
		$country_origin = htmlentities(trim($_POST["country_origin"]));
		$postcode = htmlentities(trim($_POST["postcode"]));
		$usage_purpose = htmlentities(trim($_POST["usage_purpose"]));
		/* $usage_purpose1 = htmlentities(trim($_POST["usage_purpose1"])); */
		/* if (empty($usage_purpose)) $usage_purpose = $usage_purpose1; */
		$accessed_from = htmlentities(trim($_POST["accessed_from"]));
		$found_by = htmlentities(trim($_POST["found_by"]));
		$usage_interest = htmlentities(trim($_POST["usage_interest"]));
		$gender = htmlentities(trim($_POST["gender"]));
		$age_group = htmlentities(trim($_POST["age_group"]));
		$internet_access = htmlentities(trim($_POST["internet_access"]));
		$comments = preg_replace(array("[\n]", "[\r]", "[\^]"), " ", $_POST["comments"]);
		
		// Write survey to file $FileName delimited by ^
		$today = getdate();
		if ($today["mon"] < 10) {
			// yyyymm date format
			$today["mon"] = "0" . $today["mon"];
		}

		$logDate = $today['year'].$today['mon'];
		$filename = "survey" . $logDate . ".txt"; // Create the filename in format surveyyyyymm.txt
		$today = date("Ymd");

		//$results = "$today^$search_results^$search_experience^$usability^$site_design^$comments\n";
		$results = date("d/m/y g:ia") . "^" . $_SERVER["REMOTE_ADDR"] . "^$country_origin^$postcode^$usage_purpose^$accessed_from^$found_by^$usage_interest^$gender^$age_group^$internet_access^$comments\n";
		safewrite($filename, $results); // write the survey to disk
	  	return TRUE;
	}
	
?>

	<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
	<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
	<head>
	<title>Feedback - www.gov.au</title>
	<style type='text/css' media='screen'>@import '../media/css/screen.css';</style>
	<!--[if IE]><style type='text/css' media='screen'>@import '../media/css/ie.css';</style><![endif]-->
	<!--[if gte IE 7.0]><style type='text/css' media='screen'>@import '../media/css/ie7.css';</style><![endif]-->
	<script type='text/javascript' src='../media/javascript/nav.js'></script>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	</head>

	<body>
		<div id='header'>
			<h1 class='accessibility'>www.gov.au</h1>
			<a href='../index.html'><img id='siteName' src='../media/images/www.gif' alt='www.gov.au'/></a>
			<div id='fadeDiv'></div>
			<div id='mainNav'>
			<ul>
				<li><a href='../index.html'>Home</a><span>&nbsp;</span></li>
				<li><a href='../contact.html'>Contact us</a><span>&nbsp;</span></li>
				<li><a href='../help.html'>Help</a><span>&nbsp;</span></li>
				<li><a href='../about.html'>About the site</a></li>
			</ul>
			</div>
			<div class='floatFix'></div>
		</div><!-- Header -->
		
		<div>
			<div id='navigation'>
				<h2 class='accessibility'>Government Navigation Selection</h2>
				<div id='outerCircleDiv'>
					<div id='circleDiv'></div><!-- CircleDiv -->		
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
			<div id='content'>
				<div id='contentText'>
					<h3>Thank you for your feedback.</h3>
					<p><a href='../index.html'>Back to the Home Page</a></p>
				</div><!--contentText -->
			</div><!--content -->
			<div class='floatFix'></div>
		</div>	
		
		<div id='footer'>
			<div id='copyright'>
				<p><a href='../copyright.html'>&copy; 2007</a></p>
			</div>
			
			<ul id='footerLinks'>
				<li><a href='../copyright.html'>Copyright Notice</a><span>&nbsp;</span></li>
				<li><a href='../privacy.html'>Privacy Notice</a><span>&nbsp;</span></li>
				<li><a href='../disclaimer.html'>Disclaimer</a><span>&nbsp;</span></li>
				<li><a href='../policy.html'>Information Governance Policy</a></li>
			</ul>
		</div><!-- footer -->
	</body>
	</html>

<?php
	processData();
?>
