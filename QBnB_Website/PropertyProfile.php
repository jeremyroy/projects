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
<title>Property Profile | QBnB</title>
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
<?php include 'php_back_end/PropertyProfile_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
	   <div class="col-lg-8">
			<div class="col-md-12">
				<h1> Property Information </h1>
				<div class="entry-meta table">
					<form name='ViewProp' id='ViewProp' <?php echo "action='PropertyProfile.php?property_ID=" . $_GET['property_ID'] . "'"; ?> method='post'>
						<table border='0'>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Property Name: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['property_name']; ?></td>
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
								<td>
								
								</td>
								<td></td>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Rating: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['avgRating']; ?></td>
							</tr>
							<tr>
								<td style=\"padding-top: 2px;\">
									<button 
									   onMouseOver=\"this.style.color='#ec7568'\"
									   onMouseOut=\"this.style.color='black'\"
									   style=\"color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; width: 9em;  height: 2em; \"
									   id='edit_request_PropBtn' name='edit_request_PropBtn'><?php include 'php_back_end/PropertyProfile_be_buttons.php';?></button>
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div>
				
				<?php include 'php_back_end/respondToBooking_be.php';?>
				
				</div>
				<div class="media">
				</div>
			</div>
		</div>
		<div class="col-md-4 top3">
		
		<?php 
			if(!empty($_GET['comment_ID'])){
				$myURL = "&comment_ID=" . $_GET['comment_ID'];
			} else {
				$myURL = null;
			}
		?>
		
			<!-- Search Well -->
			<div>
				<h3>Comments</h3>
				<div class="input-group">
					<form name='comments' id='comments' <?php if($_SESSION['id']==$myrow['supplier_ID']){echo "action='PropertyProfile.php?property_ID=" . $_GET['property_ID'] . $myURL . "'";} else {echo "action='PropertyProfile.php?property_ID=" . $_GET['property_ID'] . "'";} ?> method='post'>
						<table>
							<?php include 'php_back_end/comments_be.php';?>
							<tr><td></br></td></tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Leave a new <?php if(!empty($_GET['comment_ID'])){echo "reply";}else{echo "comment";}?>: </td>
							</tr>
							<tr <?php if(!empty($_GET['comment_ID'])){echo "style=\"visibility: hidden;\"";}?>>
								<td style = "padding-bottom: 4px;">
									<b>Rating: </b> 
									<select style="color:black" name='rating' id='rating' />
										<option selected value=""> -- select an option -- </option>
										<option value='1' >1</option>
										<option value='2' >2</option>
										<option value='3' >3</option>
										<option value='4' >4</option>
										<option value='5' >5</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<textarea name='newComment' id='newComment' cols="40" rows="5"></textarea>
								</td>
							</tr>
							<tr <?php if(!empty($_GET['comment_ID'])){echo "style=\"visibility: hidden;\"";}?>>
								<td><input 
									onMouseOver="this.style.color='#ec7568'"
									onMouseOut="this.style.color='black'"
									style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; "
									type='submit' id='commentBtn' name='commentBtn' value='Submit Comment' /></td>
							</tr>
							<tr <?php if(empty($_GET['comment_ID'])){echo "style=\"visibility: hidden;\"";}?>>
								<td><input 
									onMouseOver="this.style.color='#ec7568'"
									onMouseOut="this.style.color='black'"
									style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; "
									type='submit' id='replyBtn' name='replyBtn' value='Submit Reply' /></td>
							</tr>
						</table>
					</form>
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
