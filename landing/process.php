<?php
include('config.php');
// print_r($_POST);
if (isset($_POST['register'])) {
	if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$username 				= $_POST['username'];
		$email 					= $_POST['email'];
		$password			    = $_POST['password'];


		$query = "INSERT INTO Users(Username, Email, Password)" . "VALUES('$username','$email','$password')";

		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($run) {
			echo "success";
		} else {
			echo "failed";
		}
	} else {
		echo "all feilds required";
	}

	$conn->close();
}
//login form processing
	if(isset($_POST['login'])){
		if(!empty($_POST['username']) &&  !empty($_POST['password'])){
			$username =$_POST['username'];
			$password =$_POST['password'];

			$sql = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
			$result = mysqli_query($conn, $sql);

			if ($result->num_rows > 0) {
				// output data of each row
				$user = $result->fetch_assoc();
				
				$_SESSION['user']=$user;
				echo "success";
			}else{
				echo "fail";
			}
			
		}


	}
?>