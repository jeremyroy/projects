<?php
if(!isset($_SESSION['id'])){
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
} else {
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT city
					FROM rental_property natural join address
					WHERE listed='1'
					ORDER BY city";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					if(isset($_GET['search_city']) && $_GET['search_city']==$row['city']){
						echo "
							<option value=" . $row['city'] . " selected='selected'>" . $row['city'] . "</option>
						";
					} else {
						echo "
							<option value=" . $row['city'] . ">" . $row['city'] . "</option>
						";
					}
				}
			} else {
				echo "No properties matching the search constraints are currently listed.";
			}
		} else {
			echo "Bad query.";
		}
}
?>