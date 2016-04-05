<?php 
	if(isset($_GET['property_ID'])){
		include_once 'config/connection.php'; 
		//Verify if district exists
		$query = "	select start_date, end_date 
					from bookings natural join rental_property 
					where property_id=? and status=1";
		// prepare query for execution
		
		if($stmt = $con->prepare($query)){
			$propertyID = $_GET['property_ID'];
			$stmt->bind_Param("i", $propertyID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
			echo "
				<tr>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Start Date</td>
					<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">End Date</td>
				</tr>
			";
				while($row = $result->fetch_assoc()){
					echo "
						<tr style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['start_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['end_date'] . "</td>	
						</tr>
					";
				}
			} else {
				echo "<tr style=\"color: red;\">
						<td>No bookings were found for the selected property.</td>
					</tr>";
			}
		} else {
			echo "bad query";
		}
	} else {
		echo "ERRPR";
	}
?>