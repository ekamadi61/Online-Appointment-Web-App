<?php
include('config.php');
if(isset($_POST['submit']))
{
	if(!empty($_POST['username']) && !empty($_POST['mail']) && !empty($_POST['password']))
	{					 	
				$username 				= $_POST['username'];
				$mail 					= $_POST['mail'];
				$password			    = $_POST['password'];
				
                // if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                //     exit('Invalid email address'); // Use your own error handling ;)
                // }
                // $select = mysqli_query($conn, "SELECT `mail` FROM `users` WHERE `mail` = '".$_POST['mail']."'") or exit(mysqli_error($conn));
                // if(mysqli_num_rows($select)) {
                //     exit('This email is already being used');
                //     // echo '<script language="javascript">';
                //     // echo 'alert("message successfully sent")';
                //     // echo '</script>';
                // }        

                
		
        $query = "INSERT INTO users(username, mail, password)"."VALUES('$username','$mail','$password')";
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

		header("Location: login.php"); // redirect back to your contact form
        exit;

		$conn->close();
	}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Zone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="signup.css">

    

</head>
<body>
        <div class="inner">
            <div class="photo">
                <img src="slider-3.png">
            </div>
            <div class="user-form">
                 
                <h1>Create Account!</h1>
                <form action="signup.php" method="post">
               
                               
                    <i class="fas fa-user icon"></i> 
                    <input type="text"  name="username" id="username" placeholder="Your name">
                   
                    <i class="fas fa-envelope icon"></i> 
                    <input type="email" name="mail" id="mail" placeholder="Your e-mail">
                    <i class="fas fa-lock icon"></i> 
                    <input type="password" name="password" id="password" placeholder="Create password">
                   
                    <div class="action-btn">
                        <button type="submit" class="btn primary" name="submit">Create Account</button>
                        
						<a href="login.php" class="btn btn-primary">Login</a>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>