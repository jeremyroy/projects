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
<title>Home | QBnB</title>
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
<?php include 'php_back_end/home_page/main_be.php';?>
    
<!--Main Body-->
<div class="container">
   <div class="row">
	   <div class="col-lg-8">
			<div class="col-md-12">
				<h1> Home Page </h1>
				<div class="entry-meta table">
					<h3>Listed properties: </h3>
						<form name='login' id='login' action='main.php' method='post'>
							<table style="border-collapse: collapse; width: 100%">
								<tr>
									<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Property Name 
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==1){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=1'>▲</a>
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==2){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=2'>▼</a>
									</td>
									<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">City  
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==3){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=3'>▲</a>
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==4){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=4'>▼</a>
									</td>
									<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">District  
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==5){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=5'>▲</a>
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==6){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=6'>▼</a>
									</td>
									<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;"># Bedroom  
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==7){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=7'>▲</a>
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==8){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=8'>▼</a>
									</td>
									<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;"># Bathroom  
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==9){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=9'>▲</a>
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==10){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=10'>▼</a>
									</td>
									<td style = "font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">Price/Night  
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==11){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=11'>▲</a>
										<a style="text-decoration: none; cursor:pointer; color:<?php if(isset($_SESSION['orderBy']) && $_SESSION['orderBy']==12){echo "#ec7568";}else{echo "black";}?>;"
										   href='main.php?orderBy=12'>▼</a>
									</td>
								</tr>
								<?php include 'php_back_end/home_page/searchResults_be.php';?>
							</table>
						</form>
				</div>
			</div>
		</div>
		<div class="col-md-4 top3">

			<!-- Search Well -->
			<div>
				</br></br></br></br>
				<h4>Search Options</h4>
				<div class="input-group">
					<form name='search' id='search' action='main.php' method='get'>
							<table style="border-collapse: collapse; width: 100%">
								<tr>
									<td style = "padding-bottom: 4px;">City: </td>
									<td style = "padding-bottom: 4px;">
										<select style="color:black" name='search_city' id='search_city' />
											<option selected value=""> -- select an option -- </option>
											<?php include 'php_back_end/home_page/selectCity_be.php';?>
										</select>
									</td>
								</tr>
								<tr>
									<td style = "padding-bottom: 4px;">District: </td>
									<td style = "padding-bottom: 4px;">
										<select style="color:black" name='search_district' id='search_district' />
											<option selected value=""> -- select an option -- </option>
											<?php include 'php_back_end/home_page/selectDistrict_be.php';?>
										</select>
									</td>
								</tr>
								<tr>
									<td style = "padding-bottom: 4px;"># Bed: </td>
									<td style = "padding-bottom: 4px;">
										<select style="color:black" name='search_bed' id='search_bed' />
											<option selected value=""> -- select an option -- </option>
											<option value='1' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==1) {echo "selected='selected'"; }} ?> >1</option>
											<option value='2' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==2) {echo "selected='selected'"; }} ?> >2</option>
											<option value='3' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==3) {echo "selected='selected'"; }} ?> >3</option>
											<option value='4' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==4) {echo "selected='selected'"; }} ?> >4</option>
											<option value='5' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==5) {echo "selected='selected'"; }} ?> >5</option>
											<option value='6' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==6) {echo "selected='selected'"; }} ?> >6</option>
											<option value='7' <?php if(isset($_GET['search_bed'])){if($_GET['search_bed']==7) {echo "selected='selected'"; }} ?> >7</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style = "padding-bottom: 4px;"># Bath: </td>
									<td style = "padding-bottom: 4px;">
										<select style="color:black" name='search_bath' id='search_bath' />
											<option selected value=""> -- select an option -- </option>
											<option value='1' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==1) {echo "selected='selected'"; }} ?> >1</option>
											<option value='2' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==2) {echo "selected='selected'"; }} ?> >2</option>
											<option value='3' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==3) {echo "selected='selected'"; }} ?> >3</option>
											<option value='4' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==4) {echo "selected='selected'"; }} ?> >4</option>
											<option value='5' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==5) {echo "selected='selected'"; }} ?> >5</option>
											<option value='6' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==6) {echo "selected='selected'"; }} ?> >6</option>
											<option value='7' <?php if(isset($_GET['search_bath'])){if($_GET['search_bath']==7) {echo "selected='selected'"; }} ?> >7</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style = "padding-bottom: 4px;">Price Range:&nbsp </td>
									<td style = "padding-bottom: 4px;">
										<select style="color:black" name='search_price' id='search_price' />
											<option selected value=""> -- select an option -- </option>
											<option value='1' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==1) {echo "selected='selected'"; }} ?> >Under $75</option>
											<option value='2' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==2) {echo "selected='selected'"; }} ?> >$75 - $99</option>
											<option value='3' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==3) {echo "selected='selected'"; }} ?> >$100 - $124</option>
											<option value='4' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==4) {echo "selected='selected'"; }} ?> >$125 - $149</option>
											<option value='5' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==5) {echo "selected='selected'"; }} ?> >$150 - $174</option>
											<option value='6' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==6) {echo "selected='selected'"; }} ?> >$175 - $200</option>
											<option value='7' <?php if(isset($_GET['search_price'])){if($_GET['search_price']==7) {echo "selected='selected'"; }} ?> >$200+</option>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td align="center">
										<input 
										   onMouseOver="this.style.color='#ec7568'"
										   onMouseOut="this.style.color='black'"
										   style="color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; width: 6em;"
										   type='submit' id='searchBtn' name='searchBtn' value='Search' />
									</td>
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

<!--
						<tr>
							<td style = "padding-bottom: 4px; font-weight: bold; width: 11em;">Property Name </td>
							<td style = "padding-bottom: 4px; font-weight: bold; width: 8em;">City </td>
							<td style = "padding-bottom: 4px; font-weight: bold; width: 8em;">District </td>
							<td style = "padding-bottom: 4px; font-weight: bold; width: 8em;"># Bedroom </td>
							<td style = "padding-bottom: 4px; font-weight: bold; width: 8em;"># Bathroom </td>
							<td style = "padding-bottom: 4px; font-weight: bold; width: 8em;">Price/Night </td>
						</tr>
						<tr>
							<td>name</td>
						</tr>
-->
