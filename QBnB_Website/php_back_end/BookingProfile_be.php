<?php
	if(isset($_POST['cancelBtn'])){
		// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"update bookings
					set status = 'Canceled'
					where booking_id=" . $_GET['booking_ID'];
		// prepare query for execution date("Y-m-d")
		if($stmt = $con->prepare($query)){
			$stmt->execute();
			header("Location: MyBookings.php");
			die();			
		} else {
			echo "Bad query.";
		}
	}
?>

<?php 
	if (isset($_SESSION['id']) && isset($_GET['booking_ID'])) 
	{
			//Include the database connection 
			include_once 'config/connection.php';
			
			//Load information for the property
			$query = "Select DISTINCT property_name, start_date, end_date, status, house_type, street_addr, apt_no, city, district_name,
			province, country, postalCode, num_bedroom, num_bathroom, extra_features, price,
			description, supplier_ID
			FROM rental_property NATURAL JOIN address NATURAL JOIN district NATURAL JOIN bookings
			WHERE booking_ID = ?"; //change to be dynamic
			
			//Prep the query for execution
			if($stmt = $con->prepare($query))
			{
				$stmt->bind_Param("s", $_GET['booking_ID']);
				$stmt->execute();
				$result = $stmt->get_result();
				$myrow = $result->fetch_assoc();
			} else {
				echo "errors with query";
			}
	} else {
		//The user is not logged in
		header("Location: index.php");
		die();
	}
	
	//Add logic to loop through the comments
	//Add the logic to average the ratings
	//Add the logic to make apt_no = NA when zero
	//Make the property ID dynamic
	//Add logo logic
?>

<?php
	if(!isset($_GET['booking_ID'])){
		header("Location: MyBookings.php");
		die();
	}
?>

	





