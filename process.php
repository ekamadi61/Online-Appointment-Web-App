<?php
include('config.php');
if(isset($_POST['submit']))
{
	if(!empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['bdate']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['symptoms']))
	{					 	
				$full_name 				= $_POST['fname'];
				$email 						= $_POST['email'];
				$phone_number			= $_POST['phone'];
				$age         			= $_POST['bdate'];
				$appointment_date = $_POST['date'];
				$appointment_time = $_POST['time'];
				$remarks         	= $_POST['symptoms'];

		$query = "INSERT INTO bookings(full_name, email, phone_number, age, appointment_date, appointment_time, remarks)"."VALUES('$full_name','$email','$phone_number','$age','$appointment_date','$appointment_time','$remarks')";
		
		$run = mysqli_query($conn,$query) or die(mysqli_error($conn));
		if($run){
			echo "Form submitted succesfully";
		}else{
			echo "Data not submitted";
		}
	}
		else{
				echo "all feilds required";
		}

		header("Location: appointment.html"); // redirect back to your contact form
        exit;

		$conn->close();
	}
?>