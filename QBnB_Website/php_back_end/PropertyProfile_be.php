<?php 
	if (isset($_SESSION['id']) && isset($_GET['property_ID'])) 
	{
			//Include the database connection 
			include_once 'config/connection.php';
			
			//Load information for the property
			$query = "Select DISTINCT property_name, house_type, street_addr, apt_no, city, district_name,
			province, country, postalCode, num_bedroom, num_bathroom, extra_features, price,
			description, supplier_ID, avg(rating) as avgRating
			FROM rental_property NATURAL JOIN address NATURAL JOIN district NATURAL JOIN comments
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
		header("Location: MyProperties.php");
		die();
	}
?>

<?php
	if($_SESSION['id'] == $myrow['supplier_ID'] && isset($_POST['edit_request_PropBtn'])){
		header("Location: EditProperty.php?property_ID=" . $_GET['property_ID']);
		die();
	} else if ($_SESSION['id'] != $myrow['supplier_ID'] && isset($_POST['edit_request_PropBtn'])) {
		header("Location: RequestBooking.php?property_ID=" . $_GET['property_ID']);
		die();
	}
?>

<?php
	if(isset($_POST['commentBtn'])){
		$query =   "INSERT INTO Comments (member_ID, property_ID, rating, comment_date, comment_time, member_comment)
					VALUES( ?, ?, ?, ?, ?, ?)";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$date = date("Y-m-d");
			$time = date("h:i:s");
			// bind the parameters. This is the best way to prevent SQL injection hacks.
			$stmt->bind_Param("iiisss", $_SESSION['id'], $_GET['property_ID'], $_POST['rating'],
										$date, $time, $_POST['newComment']);
			// Execute the query
			$stmt->execute();
			header("Location: PropertyProfile.php?property_ID=" . $_GET['property_ID']);
			die();
		} else {
			echo "Failed to prepare the insert";
		}
	}
?>

<?php
	if(isset($_POST['replyBtn'])){
		$query =   "INSERT INTO reply (parent_ID, member_ID, reply_date, reply_time, member_reply)
					VALUES( ?, ?, ?, ?, ?)";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$date = date("Y-m-d");
			$time = date("h:i:s");
			// bind the parameters. This is the best way to prevent SQL injection hacks.
			$stmt->bind_Param("iisss", $_GET['comment_ID'], $_SESSION['id'],
										$date, $time, $_POST['newComment']);
			// Execute the query
			$stmt->execute();
			//echo "executed query";
			//header("Location: PropertyProfile.php?property_ID=" . $_GET['property_ID']);
			//die();
		} else {
			echo "Failed to prepare the insert";
		}
	}
?>

<?php
	if(isset($_GET['confirm_booking_no'])){
		echo "Please confirm booking" . $_GET['confirm_booking_no'];
		
		// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"update bookings
					set status = 'Confirmed'
					where booking_id=" . $_GET['confirm_booking_no'];
		// prepare query for execution date("Y-m-d")
		if($stmt = $con->prepare($query)){
			$stmt->execute();
			header("Location: PropertyProfile.php?property_ID=" . $_GET['property_ID']);
			die();			
		} else {
			echo "Bad query.";
		}
	}
?>

<?php
	if(isset($_GET['reject_booking_no'])){
		echo "Please confirm booking" . $_GET['confirm_booking_no'];
		
		// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"update bookings
					set status = 'Rejected'
					where booking_id=" . $_GET['reject_booking_no'];
		// prepare query for execution date("Y-m-d")
		if($stmt = $con->prepare($query)){
			$stmt->execute();
			header("Location: PropertyProfile.php?property_ID=" . $_GET['property_ID']);
			die();			
		} else {
			echo "Bad query.";
		}
	}
?>

