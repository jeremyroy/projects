<?php
if(isset($_SESSION['id'])){
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT property_name, street_addr, apt_no, city, province, country, price, property_ID
					FROM rental_property natural join address
					WHERE supplier_ID = ?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->bind_Param("s", $_SESSION['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			//Check to see if the member owns any properties:
			if($result->num_rows > 0){
				echo "<h3>Select a property to view/edit it.</h3>";
				$colCount = 1;//variable to allign properties
				//If yes, display all of them
				while($row = $result->fetch_assoc()){
					$url = "PropertyProfile.php?property_ID=" . $row['property_ID'];
					if ($colCount == 1){echo "<tr>";}//used to allign properties
					//Print property table
					echo "
						<td><table
							style=\"border: 1px solid black; width: 20em; height: 10em; cursor:pointer;\"
							onMouseOver=\"this.style.border='1px solid #ec7568'; this.style.color='#ec7568'\"
							onMouseOut=\"this.style.border='1px solid black'; this.style.color='black'\"
							onclick=\"window.location.href='" . $url . "'\">
							
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold; width: 8em;\">Property Name: </td>
								<td style = \"padding-bottom: 4px;\">" . $row['property_name'] . "</td>
							</tr>
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold;\">Street Address: </td>
								<td style = \"padding-bottom: 4px;\">" . $row['street_addr'] . "</td>
							</tr>
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold;\">Apartment No: </td>
								<td style = \"padding-bottom: 4px;\">" . $row['apt_no'] . "</td>
							</tr>
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold;\">City: </td>
								<td style = \"padding-bottom: 4px;\">" . $row['city'] . "</td>
							</tr>
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold;\">Province: </td>
								<td style = \"padding-bottom: 4px;\">" . $row['province'] . "</td>
							</tr>
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold;\">Country: </td>
								<td style = \"padding-bottom: 4px;\">" . $row['country'] . "</td>
							</tr>
							<tr>
								<td style = \"padding-bottom: 4px; font-weight: bold;\">Price / Night: </td>
								<td style = \"padding-bottom: 4px;\">$" . $row['price'] . "</td>
							</tr>
						</table></td><td>&nbsp&nbsp&nbsp</td>
						";
					if ($colCount == 2){//used to allign properties
						echo "</tr><tr><td>&nbsp </td></tr>";
						$colCount = 0;
					}
					$colCount = $colCount + 1;
				} //end list property loop
			} else {//user doesnt currently own a property	
					echo "<h3>It looks like you havn't listed any properties yet.</h3>";
			}//end property check
		} //end page display back end
} else {
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
}
?>

