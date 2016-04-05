<!DOCTYPE HTML>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Bookings | QBnB</title>
<meta name="description" content="">
<meta name="author" content="Themesrefinery">
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
<![endif]-->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/styles.css" />
<!-- Animation -->
<link rel="stylesheet" href="css/style-animate.css" />
<!-- Font Awesome -->
<link href="font/css/font-awesome.min.css" rel="stylesheet">
<!--Slider CSS-->
<link rel="stylesheet" type="text/css" href="css/slider.css">
<!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>

<?php include 'headers/userHeader.php';?>
<?php include 'php_back_end/newProperty_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> My Bookings </h1>
		<p>Click on a booking to view information about the property.</p>
        <div class="entry-meta table">
        	<form name='newProp' id='newProp' action='newProperty.php' method='post'>
				<h3>Ongoing Bookings:</h3>
				<div style=" width: 800px; height: 150px; overflow: auto;">
					<table border='0'>
						<tr>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Property Name</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">City</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Start Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">End Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Status</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Price/Night</td>
						</tr>
						<?php include 'php_back_end/myBookings_page/ongoingBookings_be.php';?>
					</table>
				</div>
				<h3>Future Bookings:</h3>
				<div style=" width: 800px; height: 150px; overflow: auto;">
					<table border='0'>
						<tr>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Property Name</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">City</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Start Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">End Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Status</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Price/Night</td>
						</tr>
						<?php include 'php_back_end/myBookings_page/futureBookings_be.php';?>
					</table>
				</div>
				<h3>Past Bookings:</h3>
				<div style=" width: 800px; height: 150px; overflow: auto;">
					<table border='0'>
						<tr>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Property Name</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">City</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Start Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">End Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Status</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Price/Night</td>
						</tr>
						<?php include 'php_back_end/myBookings_page/pastBookings_be.php';?>
					</table>
				</div>
				<h3>Requested Bookings:</h3>
				<div style=" width: 800px; height: 150px; overflow: auto;">
					<table border='0'>
						<tr>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Property Name</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">City</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Start Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">End Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Status</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Price/Night</td>
						</tr>
						<?php include 'php_back_end/myBookings_page/requestedBookings_be.php';?>
					</table>
				</div>
				<h3>Rejected Bookings:</h3>
				<div style=" width: 800px; height: 150px; overflow: auto;">
					<table border='0'>
						<tr>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Property Name</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">City</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Start Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">End Date</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Status</td>
							<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Price/Night</td>
						</tr>
						<?php include 'php_back_end/myBookings_page/rejectedBookings_be.php';?>
					</table>
				</div>
			</form>
        </div>
        <div>
        
        </div>
        <div class="media">
        </div>
       
    </div>
    
    
    </div>
 
  
  </div>
  
</div>
<!--Main Body End-->

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/jssor.js" type="text/javascript"></script>
<script src="js/jssor.slider.js" type="text/javascript"></script>
<script src="js/slider.js" type="text/javascript"></script>
</body>
</html>