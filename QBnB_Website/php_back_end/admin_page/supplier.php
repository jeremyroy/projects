<?php 
	if(isset($_POST['supply_memberBTN']) && isset($_SESSION['id'])){
		include_once 'config/connection.php'; 
		//Verify if district exists
		$query = 	"select property_id,property_name, house_type, city, district_name, start_date, end_date, num_bathroom, price
					 from bookings natural join rental_property natural join address natural join district
					 where supplier_id =?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$memberID = $_POST['list_supplier_id'];
			$stmt->bind_Param("i", $memberID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
			echo "
				<tr>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Property ID</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Property Name</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">House Type</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">City</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">District Name</td>	
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Start Date</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">End Date</td>
				</tr>
			";
				while($row = $result->fetch_assoc()){
					echo "
						<tr style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd; cursor:pointer;\"
							onMouseOver=\"this.style.color='#ec7568'\"
							onMouseOut=\"this.style.color='black'\">
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['property_id'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['property_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['house_type'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['city'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['district_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['start_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['end_date'] . "</td>							
						</tr>
					";
				}
			} else {
				echo "<p style=\"color: red;\">No properties matching the search constraints are currently listed.</p>";
			}
		} else {
			echo "bad query";
		}
	}
?>