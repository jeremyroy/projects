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
<title>View Profile | QBnB</title>
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

<!--Top Header-->
<?php include 'headers/userHeader.php';?>
<!--Top Header End-->

<?php include 'php_back_end/ViewProfile_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> My Profile </h1>
        <div class="entry-meta table">
        	<form name='register' id='register' action='EditProfile.php' method='post'>
						<table border='0'>
<!-- INSERT INTO Member VALUES('00000000001','Andrew','P','Stroz','example1@gmail.com','2017','Engineering','BSc. Computer Engineering','password123'); -->
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">First Name: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['fname']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Last Name: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['lname']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Middle Initial: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['minit']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">E-Mail Address: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['email']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Phone Number: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['phonenum']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Graduating Year: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['gradYear']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Faculty: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['faculty']; ?></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px; font-weight: bold;">Degree: </td>
								<td style = "padding-bottom: 4px;"><?php echo $myrow['degType']; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='editProfileBtn' name='editProfileBtn' value='Edit Profile' /> 
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
