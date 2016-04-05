<?php
  //Create a user session or resume an existing one
 session_start();
?>

<?php
 //check if the user is already logged in and has an active session
if(isset($_SESSION['id'])){
	//Redirect the browser to the profile editing page and kill this page.
	header("Location: main.php");
	die();
}
?>

 <?php
	if(isset($_POST['registerBtn'])){
		if(empty($_POST['first_name'])){
			$error = "Please enter a first name.<br>";
		}

		if(empty($_POST['last_name'])){
			if(isset($error)){
				$error = $error . "Please enter a last name.<br>";
			} else {
				$error = "Please enter a last name.<br>"; 
			}
		}
		
		if(empty($_POST['email_address'])){
			if(isset($error)){
				$error = $error . "Please enter an email address.<br>";
			} else {
				$error = "Please enter an email address.<br>"; 
			}
		}
		
		if(empty($_POST['password'])){
			if(isset($error)){
				$error = $error . "Please enter a password.<br>";
			} else {
				$error = "Please enter a password.<br>"; 
			}
		}
		
		if(isset($error)){
			echo $error;
		} else {
			/**Register User**/
			echo "Submit Query";
			// include database connection
			include_once 'config/connection.php';
			
			$query = 	"INSERT INTO member (fname, lname, minit, email, phonenum, gradYear, faculty, degType, password) VALUES(
						?, ?, ?, ?, ?, ?, ?, ?, ?)";
	 
			// prepare query for execution
			if($stmt = $con->prepare($query)){
				
				// bind the parameters. This is the best way to prevent SQL injection hacks.
				$stmt->bind_Param("ssssiisss", $_POST['first_name'], $_POST['last_name'], $_POST['middle_init'],
											  $_POST['email_address'], $_POST['phonenum'], $_POST['grad_year'], $_POST['faculty'], 
											  $_POST['degree'], $_POST['password']);
				 
				// Execute the query
				$stmt->execute();
			} else {
				echo "Failed to prepare the insert";
			}
			
			/**Log user in**/
			$query2 = 	"SELECT member_id 
						FROM member 
						WHERE email=? AND password=?";
 
			// prepare query for execution
			if($stmt = $con->prepare($query2)){
				// bind the parameters. This is the best way to prevent SQL injection hacks.
				$stmt->bind_Param("ss", $_POST['email_address'], $_POST['password']);
				 
				// Execute the query
				$stmt->execute();
		 
				// Get Results
				$result = $stmt->get_result();

				// Get the number of rows returned
				$num = $result->num_rows;;
				
				if($num>0){
					//If the username/password matches a user in our database
					//Read the user details
					$myrow = $result->fetch_assoc();
					//Create a session variable that holds the user's id
					$_SESSION['id'] = $myrow['member_id'];
					//instantiate other necessary session variables
					$_SESSION['constraints'] = null;
					$_SESSION['orderBy'] = null;
					//Redirect the browser to the profile editing page and kill this page.
					header("Location: main.php");
					die();
				} else {
					//If the username/password doesn't matche a user in our database
					// Display an error message and the login form
					//echo "Failed to login";
					header("Location: index.php?failedLogin=1");
					die();
				}
			} else {
				echo "failed to prepare the login";
			}
		}
	}
?>