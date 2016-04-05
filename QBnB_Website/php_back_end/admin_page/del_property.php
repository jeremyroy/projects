
<?php //delete property
	if (isset($_POST['delete_propertyBTN']) && isset($_SESSION['id'])){
		include_once 'config/connection.php'; 
		//update user profile
		$query = "delete from rental_property
				  where property_ID=?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$propertyID = $_POST['del_property_id'];
			$stmt->bind_Param("i", $propertyID);
			$stmt->execute();
			echo "Property #$propertyID Deleted";
		} else{
			echo "Bad Query";
		}
	}
?>
