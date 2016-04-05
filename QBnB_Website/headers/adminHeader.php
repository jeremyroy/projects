<?php
	
	echo "
		<header class=\"header\">
			<div class=\"container\">
				<nav class=\"navbar navbar-inverse\" role=\"navigation\">
					<div class=\"navbar-header\">
						<button type=\"button\" id=\"nav-toggle\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#main-nav\"> <span class=\"sr-only\">Toggle navigation</span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> </button>
						<a href=\"index.php\" class=\"navbar-brand scroll-top logo animated bounceInLeft rollIn\"><b><i class=\"fa\">QBnB</i></b></a></div>				
					  <div id=\"main-nav\" class=\"collapse navbar-collapse\">
						<ul class=\"nav navbar-nav\" id=\"mainNav\">
							<li class=\"active\"><a href=\"main.php\">Home</a></li>
							<li><a href=\"admin.php\">Admin</a></li>
							  <li><a href=\"MyBookings.php\">My Bookings</a></li>
							<li><a href=\"MyProperties.php\">My Properties</a></li>
							<li><a href=\"ViewProfile.php\">Profile</a></li>
							<li><a href=\"php_back_end/index_be.php?logout=1\">Log Out</a></li>
						</ul>
					  </div>  
					
				</nav>
			</div>
		</header>
	";
?>