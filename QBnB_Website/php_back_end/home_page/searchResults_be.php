<?php
if(!isset($_SESSION['id'])){
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
} else {
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT property_name, city, district_name, num_bedroom, num_bathroom, price, property_ID
					FROM rental_property natural join district natural join address
					WHERE listed='1'" . $_SESSION['constraints'] . $order;
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$url = "PropertyProfile.php?property_ID=" . $row['property_ID'];
					echo "
						<tr style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd; cursor:pointer;\"
							onclick=\"window.location.href='" . $url . "'\"
							onMouseOver=\"this.style.color='#ec7568'\"
							onMouseOut=\"this.style.color='black'\">
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['property_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['city'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['district_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['num_bedroom'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['num_bathroom'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">$" . $row['price'] . "</td>							
						</tr>
					";
				}
			} else {
				echo "<p style=\"color: red;\">No properties matching the search constraints are currently listed.</p>";
			}
		} else {
			echo "Bad query.";
		}
}
?>