<?php
if($_SESSION['id'] == $myrow['supplier_ID']){
	echo "</br><h3>Booking Requests on this Property:</h3>";
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT fName, lName, start_date, end_date, status, booking_ID
					FROM bookings join member
					WHERE property_ID=? and consumer_ID=member_ID and status='requested'
					ORDER BY start_date";
		// prepare query for execution date("Y-m-d")
		if($stmt = $con->prepare($query)){
			$stmt->bind_Param("i", $_GET['property_ID']);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				echo "
					<table border='0'>
						<tr>
							<td style = \"font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">First Name</td>
							<td style = \"font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Last Name</td>
							<td style = \"font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Start Date</td>
							<td style = \"font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">End Date</td>
							<td colspan=\"2\" style = \"font-weight: bold; padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">Action</td>
						</tr>
				";
				while($row = $result->fetch_assoc()){
					echo "
						<tr style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\"
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['fName'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['lName'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['start_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['end_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">
								<button 
									   onMouseOver=\"this.style.color='#ec7568'\"
									   onMouseOut=\"this.style.color='black'\"
									   style=\"color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; width: 9em;  height: 2em; \"
									   id='edit_request_PropBtn' name='edit_request_PropBtn'
									   onclick=\"window.location.href='PropertyProfile.php?property_ID=".$_GET['property_ID']."&confirm_booking_no=".$row['booking_ID']."'\">Confirm</button>
							</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">
								<button 
									   onMouseOver=\"this.style.color='#ec7568'\"
									   onMouseOut=\"this.style.color='black'\"
									   style=\"color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; width: 9em;  height: 2em; \"
									   id='edit_request_PropBtn' name='edit_request_PropBtn'
									   onclick=\"window.location.href='PropertyProfile.php?property_ID=".$_GET['property_ID']."&reject_booking_no=".$row['booking_ID']."'\">Reject</button>
							</td>						
						</tr>
					";
				}
				echo "
					</table>
				";
			} else {
				echo "<td style=\"color: black;\">You have 0 requested bookings.</td>";
			}
		} else {
			echo "Bad query.";
		}
}
?>