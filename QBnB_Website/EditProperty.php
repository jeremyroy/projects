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
<title>Edit Property | QBnB</title>
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
<?php include 'php_back_end/EditProperty_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> Edit Property  </h1>
        <div class="entry-meta table">
        	<form name='newProp' id='newProp' <?php echo "action='EditProperty.php?property_ID=" . $_GET['property_ID'] . "'"; ?> method='post'>
						<table border='0'>
							<?php
								if (isset($_GET['badPassword']))
								{
									echo "
										<tr>
											<td></td>
											<td style=\"font-size: 14px; color: #ec7568; font-weight: bold;\">Wrong password</td>
										</tr>";
								}
							?>
							<?php
								if (isset($_GET['goodUpdate']))
								{
									echo "
										<tr>
											<td></td>
											<td style=\"font-size: 14px; color: #51ee49; font-weight: bold;\">Profile Successfully Updated!</td>
										</tr>";
								}
							?>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Name: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='property_name' id='property_name' value="<?php echo $myrow['property_name']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Accommodation Type: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='house_type' id='house_type' value="<?php echo $myrow['house_type']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Street Address: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='street_addr' id='street_addr' value="<?php echo $myrow['street_addr']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Apartment No: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='apt_no' id='apt_no' value="<?php echo $myrow['apt_no']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">City: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='city' id='city' value="<?php echo $myrow['city']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">City District: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='district_name' id='district_name' value="<?php echo $myrow['district_name']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Province: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='province' id='province' value="<?php echo $myrow['province']; ?>" required/></td>
							</tr>
							<tr>							
								<td style = "padding-bottom: 5px; padding-right: 8px;">Country: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='country' id='country' value="<?php echo $myrow['country']; ?>" required/></td>
							</tr>
							<tr>							
								<td style = "padding-bottom: 5px; padding-right: 8px;">Postal/ZIP Code: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='postalCode' id='postalCode'value="<?php echo $myrow['postalCode']; ?>" /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Number of Bedrooms: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='num_bedroom' id='num_bedroom' value="<?php echo $myrow['num_bedroom']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Number of Bathrooms: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='num_bathroom' id='num_bathoom' value="<?php echo $myrow['num_bathroom']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Special Features: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='extra_features' id='extra_features' value="<?php echo $myrow['extra_features']; ?>" /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Price (nightly): </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='price' id='price' value="<?php echo $myrow['price']; ?>" required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;" valign="top">Description of Property: </td>
								<td>
									<textarea name='description' id='description' cols="40" rows="5"> <?php echo $myrow['description']; ?> </textarea>
								</td>
								<td></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">List property: </td>
								<td style = "padding-bottom: 5px;"><input type="checkbox" name="listed" id="listed" value='1' <?php if($myrow['listed'] == 1) {echo " checked ";} else {echo " unchecked ";} ?>/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Password: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='password' name='password_old' id='password_old' required/>(Required if Deleting or Updating Information)</td>
							</tr>
							<tr>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='saveChangeBtn' name='saveChangeBtn' value='Save Changes' /> 
								</td>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='delProfileBtn' name='delProfileBtn' value='Delete Property' 
									   onclick="return confirm('Are you sure you want to permanently delete this property listing?')"
									   formnovalidate/>
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