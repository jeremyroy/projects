<?php
  //Create a user session or resume an existing one
 session_start();
?>

<?php
 //check if the user clicked the logout link and set the logout GET parameter
if(isset($_GET['logout'])){
	//Destroy the user's session.
	$_SESSION['id']=null;
	$_SESSION['admin']=null;
	$_SESSION['constraints'] = null;
	$_SESSION['orderBy'] = null;
	session_destroy();
	header("Location: ../index.php");
	die();
}
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
 //check if the user pressed the register button
if(isset($_POST['registerBtn'])){
	//Redirect the browser to the register page and kill this page.
	header("Location: register.php");
	die();
}
?>

<?php
//check if the login form has been submitted
if(isset($_POST['loginBtn'])){
 
    // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = 	"SELECT member_id, email, password, admin 
					FROM member 
					WHERE email=? AND password=?";
 
        // prepare query for execution
        if($stmt = $con->prepare($query)){
			
			// bind the parameters. This is the best way to prevent SQL injection hacks.
			$stmt->bind_Param("ss", $_POST['username'], $_POST['password']);
			 
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
				//check if user is administrator
				if($myrow['admin'] == 1){
					$_SESSION['admin'] = 1;
				}
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
			echo "failed to prepare the SQL";
		}
 }
?>