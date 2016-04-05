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
<title>Administrator | QBnB</title>
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
    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> Administrator Control Panel </h1>
        <div class="entry-meta table">
			<h2> List Supplier Bookings and Ratings</h2>
			<form name='supply_member' id='supply_member' action='admin.php' method='post'>
				<table border='0'>
					<tr>
						<td style = "padding-bottom: 5px; padding-right: 8px;">Supplier ID: </td>
						<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='list_supplier_id' id='list_supplier_id' required/></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input 
							   onMouseOver="this.style.color='#ec7568'"
							   onMouseOut="this.style.color='black'"
							   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
							   type='submit' id='supply_memberBTN' name='supply_memberBTN' value='View' /> 
						</td>
					</tr>
					<tr>
						 <?php include 'php_back_end/admin_page/supplier.php';?>
					</tr>
				</table>
			</form>
			<h2> List Property Bookings and Ratings</h2>
			<form name='list_propery' id='list_propery' action='admin.php' method='post'>
				<table border='0'>
					<tr>
						<td style = "padding-bottom: 5px; padding-right: 8px;">Property ID: </td>
						<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='list_property_id' id='list_property_id' required/></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input 
							   onMouseOver="this.style.color='#ec7568'"
							   onMouseOut="this.style.color='black'"
							   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
							   type='submit' id='list_propertyBTN' name='list_propertyBTN' value='View' /> 
						</td>
					</tr>
					<tr>
						 <?php include 'php_back_end/admin_page/property.php';?>
					</tr>
				</table>
			</form>
			<h2> List Consumer Bookings</h2>
			<form name='consumer_member' id='consumer_member' action='admin.php' method='post'>
				<table border='0'>
					<tr>
						<td style = "padding-bottom: 5px; padding-right: 8px;">Member ID: </td>
						<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='consumer_member_id' id='consumer_member_id' required/></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input 
							   onMouseOver="this.style.color='#ec7568'"
							   onMouseOut="this.style.color='black'"
							   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
							   type='submit' id='consumer_memberBTN' name='consumer_memberBTN' value='View' /> 
						</td>
					</tr>
					<tr>
						 <?php include 'php_back_end/admin_page/consumer.php';?>
					</tr>
				</table>
			</form>
			<h2> Delete Member </h2>
			<form name='delete_member' id='delete_member' action='admin.php' method='post'>
				<table border='0'>
					<tr>
						<td style = "padding-bottom: 5px; padding-right: 8px;">Member ID: </td>
						<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='del_member_id' id='del_member_id' required/></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input 
							   onMouseOver="this.style.color='#ec7568'"
							   onMouseOut="this.style.color='black'"
							   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
							   type='submit' id='delete_memberBTN' name='delete_memberBTN' value='Delete Member' /> 
						</td>
					</tr>
					<tr>
						 <?php include 'php_back_end/admin_page/del_member.php';?>
					</tr>
				</table>
			</form>
			<h2> Delete Property </h2>
			<form name='delete_property' id='delete_property' action='admin.php' method='post'>
				<table border='0'>
					<tr>
						<td style = "padding-bottom: 5px; padding-right: 8px;">Property ID: </td>
						<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='del_property_id' id='del_property_id' required/></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input 
							   onMouseOver="this.style.color='#ec7568'"
							   onMouseOut="this.style.color='black'"
							   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
							   type='submit' id='delete_propertyBTN' name='delete_propertyBTN' value='Delete Property' /> 
						</td>
					</tr>
					<td>
						 <?php include 'php_back_end/admin_page/del_property.php';?>
					</td>
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
