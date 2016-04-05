<?php
if(!isset($_SESSION['id'])){
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
} else {
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT property_name, city, start_date, end_date, status, price, booking_ID
					FROM rental_property natural join address natural join bookings
					WHERE consumer_ID=? AND start_date<=? AND end_date>=? and status='confirmed' 
					ORDER BY end_date";
		// prepare query for execution date("Y-m-d")
		if($stmt = $con->prepare($query)){
			$currDate=date("Y-m-d");
			$stmt->bind_Param("iss", $_SESSION['id'], $currDate, $currDate);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$url = "BookingProfile.php?booking_ID=" . $row['booking_ID'];
					echo "
						<tr style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd; cursor:pointer;\"
							onclick=\"window.location.href='" . $url . "'\"
							onMouseOver=\"this.style.color='#ec7568'\"
							onMouseOut=\"this.style.color='black'\">
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['property_name'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['city'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['start_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['end_date'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">" . $row['status'] . "</td>
							<td style = \"padding: 8px; text-align: left; border-bottom: 1px solid #ddd;\">$" . $row['price'] . "</td>							
						</tr>
					";
				}
			} else {
				echo "<td style=\"color: black;\">You have 0 upcomming bookings.</td>";
			}
		} else {
			echo "Bad query.";
		}
}
?>