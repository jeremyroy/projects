
<?php //delete profile
	if (isset($_POST['delete_memberBTN']) && isset($_SESSION['id'])){
		include_once 'config/connection.php'; 
		//update user profile
		$query = "delete from member
				  where member_ID=?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$memberID = $_POST['del_member_id'];
			$stmt->bind_Param("i", $memberID);
			$stmt->execute();
			echo "User #$memberID Deleted";
		} else{
			echo "Bad Query";
		}
	}
?>
