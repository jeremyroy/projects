<?php
if(isset($_SESSION['id'])){
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT fname, lname, minit, email, gradYear, faculty, degType, phonenum
					FROM member
					WHERE member_ID = ?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->bind_Param("s", $_SESSION['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow = $result->fetch_assoc();
		}
} else {
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: index.php");
	die();
}

?>