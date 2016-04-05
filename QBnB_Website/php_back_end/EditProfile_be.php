 <?php
if(isset($_SESSION['id'])){
	// include database connection
		include_once 'config/connection.php'; 
		
		//Verify if district exists
		$query = 	"SELECT DISTINCT fname, lname, minit, email, phonenum, gradYear, faculty, degType, phonenum
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


<?php //Update profile without new password
	if(isset($_POST['chngProfileBtn']) && isset($_SESSION['id']) && empty($_POST['password_new'])){
		//check if correct password
		$query = 	"SELECT member_id 
					FROM member 
					WHERE member_id=? AND password=?";
 
        // prepare query for execution
        if($stmt = $con->prepare($query)){
			// bind the parameters. This is the best way to prevent SQL injection hacks.
			$stmt->bind_Param("ss", $_SESSION['id'], $_POST['password_old']);
			$stmt->execute();
			$result = $stmt->get_result();
			$num = $result->num_rows;;
			if($num>0){
				//update user profile
				$query = "update member
						  set fname=?, lname=?, minit=?, email=?, phonenum=?, gradYear=?, faculty=?, degType=?
						  where member_ID=? and password=?";
				// prepare query for execution
				if($stmt = $con->prepare($query)){
					$stmt->bind_Param("ssssiissis", $_POST['first_name'], $_POST['last_name'], 
												   $_POST['middle_init'], $_POST['email_address'], $_POST['phonenum'],
												   $_POST['grad_year'], $_POST['faculty'],
												   $_POST['degree'], $_SESSION['id'], $_POST['password_old']);
					$stmt->execute();
					header("Location: EditProfile.php?goodUpdate=1");
					die;
				} else{
					echo "bad querie";
				}
			} else {
				header("Location: EditProfile.php?badPassword=1");
				die();
			}
		}
	}
?>

<?php //update profile with new password
	if(isset($_POST['chngProfileBtn']) && isset($_SESSION['id']) && !empty($_POST['password_new'])){
		//check if correct password
		$query = 	"SELECT member_id 
					FROM member 
					WHERE member_id=? AND password=?";
 
        // prepare query for execution
        if($stmt = $con->prepare($query)){
			// bind the parameters. This is the best way to prevent SQL injection hacks.
			$stmt->bind_Param("ss", $_SESSION['id'], $_POST['password_old']);
			$stmt->execute();
			$result = $stmt->get_result();
			$num = $result->num_rows;;
			if($num>0){
				//update user profile
				$query = "update member
						  set fname=?, lname=?, minit=?, email=?, gradYear=?, faculty=?, degType=?, password=?
						  where member_ID=? and password=?";
				// prepare query for execution
				if($stmt = $con->prepare($query)){
					$stmt->bind_Param("ssssisssis", $_POST['first_name'], $_POST['last_name'], 
												   $_POST['middle_init'], $_POST['email_address'],
												   $_POST['grad_year'], $_POST['faculty'],
												   $_POST['degree'], $_POST['password_new'],
												   $_SESSION['id'], $_POST['password_old']);
					$stmt->execute();
					header("Location: EditProfile.php?goodUpdate=1");
					die;
				} else{
					echo "bad querie";
				}
			} else {
				header("Location: EditProfile.php?badPassword=1");
				die();
			}
		}
	}
?>

<?php //delete profile
	if (isset($_POST['delProfileBtn']) && isset($_SESSION['id'])){
		echo "hi";
		//update user profile
		$query = "delete from member
				  where member_ID=?";
		// prepare query for execution
		if($stmt = $con->prepare($query)){
			$stmt->bind_Param("i", $_SESSION['id']);
			$stmt->execute();
				//Destroy the user's session.
			$_SESSION['id']=null;
			$_SESSION['admin']=null;
			session_destroy();
			header("Location: index.php");
			die();
		} else{
			echo "bad querie";
		}
	}
?>
