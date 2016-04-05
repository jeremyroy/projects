<?php
if(!isset($_SESSION['id'])){
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
} else {
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT district_name, district_ID
					FROM rental_property natural join district
					WHERE listed='1'
					ORDER BY district_name";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					if(isset($_GET['search_district']) && $_GET['search_district']==$row['district_ID']){
						echo "
							<option value=" . $row['district_ID'] . " selected='selected'>" . $row['district_name'] . "</option>
						";
					} else {
						echo "
							<option value=" . $row['district_ID'] . ">" . $row['district_name'] . "</option>
						";
					}
				}
			} else {
				echo "<option>No districts</option>";
			}
		} else {
			echo "<option>Bad query.</option>";
		}
}
?>