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
<title>Request Booking | QBnB</title>
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
<?php include 'php_back_end/RequestBooking_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> Booking Request </h1>
        <div class="entry-meta table">
        	<form name='bookReq' id='bookReq' <?php echo "action='RequestBooking.php?property_ID=" . $_GET['property_ID'] . "'"; ?> method='post'>
						<table border='0'>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Name: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['property_name']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Address: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['street_addr']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property City: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['city']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Unavailable For Following Dates: </td>
								<?php include 'php_back_end/list_bookings_aval_be.php';?> 
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Your Arrival Date: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='date' name='start_date' id='start_date' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Your Departure Date: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='date' name='end_date' id='end_date' required/></td>
							</tr>
							<tr>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='book_req_submit' name='book_req_submit' value='Submit Request' /> 
								</td>
							</tr>
						</table>
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
