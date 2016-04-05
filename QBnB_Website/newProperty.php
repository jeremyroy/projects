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
<title>New Property | QBnB</title>
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
    	<h1> New Property Registration </h1>
        <div class="entry-meta table">
        	<form name='newProp' id='newProp' action='newProperty.php' method='post'>
						<table border='0'>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Name: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='property_name' id='property_name' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Accommodation Type: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='house_type' id='house_type' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Street Address: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='street_address' id='street_address' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Apartment No: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='apt_no' id='apt_no' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">City: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='city' id='city' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">City District: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='district_name' id='district_name' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Province: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='province' id='province' required/></td>
							</tr>
							<tr>							
								<td style = "padding-bottom: 5px; padding-right: 8px;">Country: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='country' id='country' required/></td>
							</tr>
							<tr>							
								<td style = "padding-bottom: 5px; padding-right: 8px;">Postal/ZIP Code: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='postal_code' id='postal_code'/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Number of Bedrooms: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='num_bedroom' id='num_bedroom' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Number of Bathrooms: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='num_bath' id='num_bath' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Special Features: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='features' id='features' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Price (nightly): </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='price' id='price' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;" valign="top">Description of Property: </td>
								<td>
									<textarea name='description' id='description' cols="40" rows="5"></textarea>
								</td>
								<td></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">List property: </td>
								<td style = "padding-bottom: 5px;"><input type="checkbox" name="listed" id="listed" value="List property"></td>
							</tr>
							<tr>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='addPropertyBtn' name='addPropertyBtn' value='Add Property' /> 
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
