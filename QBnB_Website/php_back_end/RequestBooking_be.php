<?php 
	if (isset($_SESSION['id']) && isset($_GET['property_ID'])) 
	{
			//Include the database connection 
			include_once 'config/connection.php';
			
			//Load information for the property
			$query = "Select DISTINCT property_name, house_type, street_addr, apt_no, city, district_name,
			province, country, postalCode, num_bedroom, num_bathroom, extra_features, price,
			description, supplier_ID
			FROM rental_property NATURAL JOIN address NATURAL JOIN district
			WHERE property_ID = ?"; //change to be dynamic
			
			//Prep the query for execution
			if($stmt = $con->prepare($query))
			{
				$stmt->bind_Param("s", $_GET['property_ID']);
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
	if(!isset($_GET['property_ID'])){
		header("Location: main.php");
		die();
	}
?>


<?php
if(isset($_POST['book_req_submit'])){
	
	// include database connection
	include_once 'config/connection.php'; 
	
	//add booking to table
	$query = 	"INSERT INTO bookings (consumer_ID, property_ID, start_date, end_date, status) 
				VALUES(?, ?, ?, ?, 3)";//right now status defaulted

	if($stmt = $con->prepare($query)){
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
		$stmt->bind_Param("siss", $_SESSION['id'], $_GET['property_ID'], 	$_POST['start_date'], $_POST['end_date']);
		 
		// Execute the query
		$stmt->execute();
						
		header("Location: main.php");
		die();
	} else {
		echo "Failed to prepare the SQL";
	}
}
?>