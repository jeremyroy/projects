<?php
	// include database connection
	include_once 'config/connection.php'; 
	
	//Verify if district exists
	$query = 	"SELECT DISTINCT *
				FROM comments natural join member natural join rental_property
				WHERE property_ID = ?
				ORDER BY comment_date, comment_time DESC";
	// prepare query for execution
	if($stmt = $con->prepare($query)){
		$stmt->bind_Param("i", $_GET['property_ID']);
		$stmt->execute();
		$result = $stmt->get_result();
		//Check to see if there are any comments on the property:
		if($result->num_rows > 0){
			if($_SESSION['id'] == $myrow['supplier_ID']){
				echo "<p>Select a comment to reply to it.</p>";
			}
			while($row = $result->fetch_assoc()){
				$url = "PropertyProfile.php?property_ID=".$row['property_ID']."&comment_ID=".$row['comment_ID'];
				if($_SESSION['id'] == $row['supplier_ID']){
					if(isset($_GET['comment_ID']) && $_GET['comment_ID']==$row['comment_ID']){
						$activateReply = "style=\"color: #ec7568;\"";
					} else {
						$activateReply = "style=\"cursor:pointer;\"
								onMouseOver=\"this.style.color='#ec7568'\"
								onMouseOut=\"this.style.color='black'\" ";
					}
					echo "
						<tr ".$activateReply."onclick=\"window.location.href='" . $url . "'\">";
				} else{
					echo "<tr>";
				}
				echo	"<td> &nbsp 
							<table style=\"\">
								<tr>
									<td style = \"padding-bottom: 4px; font-weight: bold;\">Member: &nbsp&nbsp </td>
									<td style = \"padding-bottom: 4px; font-weight: bold;\">Date: &nbsp&nbsp </td>
									<td style = \"padding-bottom: 4px; font-weight: bold;\">Time: &nbsp&nbsp </td>
									<td style = \"padding-bottom: 4px; font-weight: bold;\">Rating: &nbsp&nbsp </td>
								</tr>
								<tr>
									<td style = \"padding-bottom: 4px;\">".$row['fName']." ".$row['lName']."&nbsp&nbsp </td>
									<td style = \"padding-bottom: 4px;\">".$row['comment_date']."&nbsp&nbsp </td>
									<td style = \"padding-bottom: 4px;\">".$row['comment_time']."&nbsp&nbsp </td>
									<td style = \"padding-bottom: 4px;\">".$row['rating']." &nbsp&nbsp </td>
								</tr>
								<tr>
									<td colspan=\"4\" style = \"padding-bottom: 4px;\"><b>Comment:</b> &nbsp&nbsp".$row['member_comment']." </td>
								</tr>";
					/*if($row['supplier_ID'] == $_SESSION['id']){
						echo "	
								<tr>
									<td><input style=\"color:black\" type='text' name='reply' id='reply' required/></td>
									<td><input 
									onMouseOver=\"this.style.color='#ec7568'\"
									onMouseOut=\"this.style.color='black'\"
									style=\"color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px;\"
									type='submit' id='replyBtn' name='replyBtn' value='Submit Reply' /></td>
								</tr>
						";
					}*/
				echo"
							</table>
						</td>
					</tr>";
				//print all replies
				$query_reply = "SELECT DISTINCT *
								FROM reply natural join member
								WHERE parent_ID = ?";
				if($stmt_reply = $con->prepare($query_reply)){
					$stmt_reply->bind_Param("i", $row['comment_ID']);
					$stmt_reply->execute();
					$result_reply = $stmt_reply->get_result();
					if($result_reply->num_rows > 0){
						while($row_reply = $result_reply->fetch_assoc()){
							echo "
								<tr>
									<td> &nbsp 
										<table style=\"margin-left: 3em;\">
											<tr>
												<td style = \"padding-bottom: 4px; font-weight: bold;\">Member: &nbsp&nbsp </td>
												<td style = \"padding-bottom: 4px; font-weight: bold;\">Date: &nbsp&nbsp </td>
												<td style = \"padding-bottom: 4px; font-weight: bold;\">Time: &nbsp&nbsp </td>
											</tr>
											<tr>
												<td style = \"padding-bottom: 4px;\">".$row_reply['fName']." ".$row_reply['lName']."&nbsp&nbsp </td>
												<td style = \"padding-bottom: 4px;\">".$row_reply['reply_date']."&nbsp&nbsp </td>
												<td style = \"padding-bottom: 4px;\">".$row_reply['reply_time']."&nbsp&nbsp </td>
											</tr>
											<tr>
												<td colspan=\"3\" style = \"padding-bottom: 4px;\"><b>Reply:</b> &nbsp&nbsp".$row_reply['member_reply']." </td>
											</tr>
										</table>
									</td>
								</tr>";
						}
					}
				} else {
					echo "Bady reply query";
				}
			}
		} else {
			echo "
					<tr>
						<td>No comments were found for this property.</td>
					</tr>";
		}
	}
?>

<?php
	if(isset($_POST['commentBtn'])){
		
	}
?>