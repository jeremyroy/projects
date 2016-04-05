<?php 
	if (isset($_GET['property_ID'])) 
	{
			//Include the database connection 
			include_once 'config/connection.php';
		
			//Load information for the property
			$query = "Select DISTINCT property_name, house_type, street_addr, apt_no, city, district_name,
			province, country, postalCode, num_bedroom, num_bathroom, extra_features, price,
			description, listed
			FROM rental_property NATURAL JOIN address NATURAL JOIN district
			WHERE property_ID = ?"; //change to be dynamic
		// prepare query for execution
		if($stmt = $con->prepare($query))
		{
			$stmt->bind_Param("s", $_GET['property_ID']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow = $result->fetch_assoc();
		}
		else
		{
			echo "query issue";
		}
	} 
	else 
	{
		header("Location: MyProperties.php");
		die();
	}
?>

<?php
	//See if the change info button is hit
	if(isset($_POST['saveChangeBtn']) && !empty($_POST['password_old']))
	{
		//Check the user password
		//check if correct password
		$query = 	"SELECT member_id 
					FROM member 
					WHERE member_id=? AND password=?";
 
        // prepare query for execution
        if($stmt = $con->prepare($query))
		{
			// bind the parameters. This is the best way to prevent SQL injection hacks.
			$stmt->bind_Param("ss", $_SESSION['id'], $_POST['password_old']);
			$stmt->execute();
			$result = $stmt->get_result();
			$num = $result->num_rows;;
			if($num>0)
			{
				if(isset($_POST['listed'])){
					$listed = 1;
				} else {
					$listed = 0;
				}
				echo $listed;
				//Update the property profile make property id dynamic
				$query = "update rental_property
						SET property_name = ?, house_type = ?, num_bedroom = ?, num_bathroom = ?, extra_features = ?, price = ?,
						description = ?, listed=?
						where property_ID = ?";
				//Prepare query for execution
				if($stmt = $con->prepare($query))
				{
					$stmt->bind_Param("ssiisisii", $_POST['property_name'], $_POST['house_type'], 
									   $_POST['num_bedroom'], $_POST['num_bathroom'],
									   $_POST['extra_features'], $_POST['price'],
									   $_POST['description'], $listed, $_GET['property_ID']);
					$stmt->execute();
					echo "good rental_property update";
				} 
				else
				{
					echo "bad property querie";
				}
				
				//Update address profile 
				$query2 = "update address
						SET street_addr = ?, city = ?, province = ?, country = ?, postalCode = ?, apt_no = ?
						where property_ID = ?";
				//Prepare query for execution
				if($stmt = $con->prepare($query2))
				{
					$stmt->bind_Param("sssssii", $_POST['street_addr'], $_POST['city'], 
											$_POST['province'], $_POST['country'],
											$_POST['postalCode'], $_POST['apt_no'], $_GET['property_ID']);
					$stmt->execute();
					echo "good address update";
					header("Location: EditProperty.php?goodUpdate=1&property_ID=".$_GET['property_ID']);
					die;
				} 
				else
				{
					echo "bad property address";
				}
				
			} 
			else 
			{
				echo "bad password";
				header("Location: EditProperty.php?badPassword=1&property_ID=".$_GET['property_ID']);
				die();
			}
		}
	}
		
		//check listed
		//distric id
?>

<?php //delete profile
	if (isset($_POST['delProfileBtn']) && isset($_SESSION['id'])){
		echo "hi";
		//delete rental_property
		$query = "delete from rental_property
				  where property_ID=?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->bind_Param("i", $_GET['property_ID']);
			$stmt->execute();
			header("Location: MyProperties.php");
			die();
		} else{
			echo "bad querie";
		}
	}
?>