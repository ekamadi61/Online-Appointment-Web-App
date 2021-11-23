<?php
include('config.php');
session_start();
if(!empty($_POST['username']) && !empty($_POST['mail']) && !empty($_POST['password']))
{
    if(isset($_POST['submit'])){
        $username 				= $_POST['username'];
		$mail 					= $_POST['mail'];
		$password			    = $_POST['password'];
		
        $sql = "SELECT * FROM users WHERE mail='$mail'";
        $run = mysqli_query($conn, $sql);
        	
        if($run){
            echo "<script>alert('This email or Contact Number already associated with another account');</script>";
            
        }else{
            $query = "INSERT INTO users(username, mail, password)"."VALUES('$username','$mail','$password')";
            $run = mysqli_query($conn,$query) or die(mysqli_error($conn));
            if($run){
                echo "Account created succesfully!";
                header("Location: login.php");
                
             }else{
                 echo "Oops!Something went wrong!";
             }
		}      
    }

}else{
    echo "All fields required";
   
}

unset($_SESSION);//addition
$conn->close();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Zone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
        <div class="inner">
            
            <div class="photo">
                <img src="img/signup.jpg">
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