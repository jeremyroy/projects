<?php 
	if(isset($_POST['list_propertyBTN']) && isset($_SESSION['id'])){
		include_once 'config/connection.php'; 
		//Verify if district exists
		$query = "	select consumer_id, property_name, house_type, city, district_name, start_date, end_date, num_bathroom, price, avg(rating) as avgratings 
					from bookings natural join rental_property natural join address natural join district natural join comments 
					where property_id=?
					group by booking_ID";
		// prepare query for execution
		
		if($stmt = $con->prepare($query)){
			$propertyID = $_POST['list_property_id'];
			$stmt->bind_Param("i", $propertyID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
			echo "
				<tr>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Consumer ID</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Property Name</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">City</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">District Name</td>	
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Start Date</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">End Date</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Average Rating</td>
				</tr>
			";
				while($row = $result->fetch_assoc()){
					echo "
						<tr style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd; cursor:pointer;\"
							onMouseOver=\"this.style.color='#ec7568'\"
							onMouseOut=\"this.style.color='black'\">
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['consumer_id'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['property_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['city'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['district_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['start_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['end_date'] . "</td>	
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['avgratings'] . "</td>
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