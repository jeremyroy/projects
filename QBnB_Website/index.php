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
<title>QBnB</title>
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

<?php include 'php_back_end/index_be.php';?>

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

<!--Slider Start-->

	<div id="main" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 590px; overflow: hidden; vertical-align:middle;">
        <!-- Slides Container -->
                <img style="height:100%; vertical-align:middle;" u="image" src="images/slides/queens_small.jpg" />
                
                <div style="position: absolute; width: 800px; height: 120px; top: 30px; left: 30px; padding: 5px;
                    text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
                        color: #FFFFFF;">Welcome to QBnB.
                </div>
                <div style="position: absolute; width: 480px; height: 120px; top: 150px; left: 30px; padding: 5px;
                    text-align: left; line-height: 36px; font-size: 30px;
                        color: #FFFFFF;">
					<form name='login' id='login' action='index.php' method='post'>
						<table border='0'>
							<?php
								if (isset($_GET['failedLogin']))
								{
									echo "
										<tr>
											<td></td>
											<td style=\"font-size: 20px; color: #ec7568; font-weight: bold;\">Wrong username or password</td>
										</tr>";
								}
							?>
							<tr>
								<td style = "padding-bottom: 4px;">Email: </td>
								<td style = "padding-bottom: 4px;"><input style="color:black" type='text' name='username' id='username' /></td>
							</tr>
							<tr>
								<td style = "padding-bottom: 4px;">Password:&nbsp </td>
								<td style = "padding-bottom: 4px;"><input style="color:black" type='password' name='password' id='password' /></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input 
									   onMouseOver="this.style.color='#ec7568'"
									   onMouseOut="this.style.color='black'"
									   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px"
									   type='submit' id='loginBtn' name='loginBtn' value='Log In' /> 
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
    </div>
    <script language="javascript">
        function autoResizeDiv()
        {
            document.getElementById('main').style.height = window.innerHeight - 54 + 'px';
			document.getElementById('main').style.width = window.innerWidth - 150 + 'px';
			if (window.innerWidth <= 750)
			{
				document.getElementById('main').style.width = 600 + 'px';
			}
			if (window.innerHeight <= 430)
			{
				document.getElementById('main').style.height = 375 + 'px';
			}
        }
        window.onresize = autoResizeDiv;
        autoResizeDiv();
    </script>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/jssor.js" type="text/javascript"></script>
<script src="js/jssor.slider.js" type="text/javascript"></script>
<script src="js/slider.js" type="text/javascript"></script>
</body>
</html>
