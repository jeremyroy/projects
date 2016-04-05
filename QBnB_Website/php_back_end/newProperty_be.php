<?php
if(isset($_SESSION['id'])){
	if(isset($_POST['addPropertyBtn'])){
		
		// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT district_ID 
					FROM district
					WHERE district_name = ?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->bind_Param("s", $_POST['district_name']);
			$stmt->execute();
			$result = $stmt->get_result();
			$num = $result->num_rows;
			if($num>0){ //if the district exists, create new property
				$myrow = $result->fetch_assoc();
				//Add property to relation
							// Add property to relation	
								$query = 	"INSERT INTO rental_property (supplier_ID, property_name, district_ID, 
																		  house_type, description, num_bedroom, 
																		  num_bathroom, price, extra_features, listed) 
											VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
						 
								if($stmt = $con->prepare($query)){
									if(isset($_POST['listed'])){
										$listed = 1;
									} else {
										$listed = 0;
									}
									// bind the parameters. This is the best way to prevent SQL injection hacks.
									$stmt->bind_Param("isissiiisi", $_SESSION['id'], $_POST['property_name'], $myrow['district_ID'], 
																	  $_POST['house_type'], $_POST['description'], $_POST['num_bedroom'],
																	  $_POST['num_bath'], $_POST['price'], $_POST['features'],
																	  $listed);
									 
									// Execute the query
									$stmt->execute();
								} else {
									echo "Failed to prepare the SQL";
								}
							
							// Get Property ID
								$query2 = 	"SELECT property_id 
											FROM rental_property 
											WHERE supplier_ID=? AND property_name=?";
					 
								// prepare query for execution
								if($stmt = $con->prepare($query2)){
									// bind the parameters. This is the best way to prevent SQL injection hacks.
									$stmt->bind_Param("is", $_SESSION['id'], $_POST['property_name']);
									$stmt->execute();
									$result = $stmt->get_result();
									$myrow = $result->fetch_assoc();
								}
							// Add entry to address relation
								$query = 	"INSERT INTO address (property_ID, street_addr, city, province, 
																  country, postalCode, apt_no) 
											VALUES(?, ?, ?, ?, ?, ?, ?)";
						 
								if($stmt = $con->prepare($query)){
									
									// bind the parameters. This is the best way to prevent SQL injection hacks.
									$stmt->bind_Param("isssssi",	$myrow['property_id'],
																	$_POST['street_address'], $_POST['city'], 
																	$_POST['province'], $_POST['country'],
																	$_POST['postal_code'], $_POST['apt_no']);
									 
									// Execute the query
									$stmt->execute();
									header("Location: main.php");
									die();
								} else {
									echo "Failed to prepare the SQL";
								}
			} else {
				header("Location: newProperty.php?invalidDistrict=1");
				die();
			}
		} else {
			echo "failed to prepare the SQL";
		}
	}		
} else {
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
}

?>
