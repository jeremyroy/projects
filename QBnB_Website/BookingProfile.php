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
<title>Booking Profile | QBnB</title>
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
<?php include 'php_back_end/BookingProfile_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> Booking Information </h1>
        <div class="entry-meta table">
        	<form name='ViewProp' id='ViewProp' <?php echo "action='BookingProfile.php?booking_ID=" . $_GET['booking_ID'] . "'"; ?> method='post'>
						<table border='0'>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Name: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['property_name']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Start Date: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['start_date']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">End Date: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['end_date']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Status: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['status']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Accommodation Type: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['house_type']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Street Address: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['street_addr']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Apartment No: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['apt_no']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">City: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['city']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">City District: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['district_name']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Province: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['province']; ?></td>
							</tr>
							<tr>							
								<td style = "padding-bottom: 5px; padding-right: 8px;">Country: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['country']; ?></td>
							</tr>
							<tr>							
								<td style = "padding-bottom: 5px; padding-right: 8px;">Postal/ZIP Code: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['postalCode']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Number of Bedrooms: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['num_bedroom']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Number of Bathrooms: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['num_bathroom']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Special Features: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['extra_features']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Price (nightly): </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['price']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;" valign="top">Description of Property: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['description']; ?></td>
							</tr>
							<tr>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="<?php if($myrow['start_date'] < date("Y-m-d") && $myrow['status'] != 1){ echo "display: none;";}?> color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='cancelBtn' name='cancelBtn' value='Cancel Booking' /> 
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
