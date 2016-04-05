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
<title>Register | QBnB</title>
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

<?php include 'php_back_end/register_be.php';?>

<!--Top Header-->
<header class="header">
	<div class="container">
    	<nav class="navbar navbar-inverse" role="navigation">
        	<div class="navbar-header">
            	<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="index.php" class="navbar-brand scroll-top logo animated bounceInLeft rollIn"><b><i class="fa">QBnB</i></b></a></div>				
              <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mainNav">
                  <li class="active"><a href="#">Home</a></li>
                </ul>
              </div>  
            
        </nav>
    </div>
</header>
<!--Top Header End-->

    
<!--Main Body-->
<div class="container">
   <div class="row">
   <div class="col-lg-8">
    <div class="col-md-12">
    	<h1> Register </h1>
        <div class="entry-meta table">
        	<form name='register' id='register' action='register.php' method='post'>
						<table border='0'>
<!-- INSERT INTO Member VALUES('00000000001','Andrew','P','Stroz','example1@gmail.com','2017','Engineering','BSc. Computer Engineering','password123'); -->
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">First Name: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='first_name' id='first_name' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Last Name: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='last_name' id='last_name' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Middle Initial: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='middle_init' id='middle_init' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">E-Mail Address: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='email' name='email_address' id='email_address' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Phone Number: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='tel' name='phonenum' id='phonenum' required/></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Graduating Year: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='grad_year' id='grad_year' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Faculty: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='faculty' id='faculty' /></td>
		
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Degree: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='text' name='degree' id='degree' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 5px; padding-right: 8px;">Password: </td>
								<td style = "padding-bottom: 5px;"><input style="color:black" type='password' name='password' id='password' required/></td>
							</tr>

							<tr>
								<td></td>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='registerBtn' name='registerBtn' value='Register' /> 
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
