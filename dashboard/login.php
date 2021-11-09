<?php
include('config.php');
session_start();
error_reporting(0);
if(isset($_SESSION['username']) && isset($_SESSION['mail'])){
    header("Location: home.php");
}

if(isset($_POST['submit']))
{
    
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE mail='$mail' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['mail'] = $row['mail'];
        header("Location: home.php");
    }else{
        echo "<script>alert('Invalid Email or Password.')</script>";
    }
}


?>
  

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Zone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">

    
</head>
<body>
        <div class="inner">
            <div class="photo">
                <img src="slider-3.png">
            </div>
            <div class="user-form">
                <h1>Admin Login!</h1>
                <form action="" method="POST">
                
               
                    <i class="fas fa-envelope icon"></i> 
                    <input type="email" name="mail" id="mail" placeholder="Enter email" required="true">
                   
                    <i class="fas fa-lock icon"></i> 
                    <input type="password" name="password" id="password" placeholder="Enter password" required="true">
                    
                    <div class="action-btn">
                        <button class="btn primary" type="submit" name="submit">Login</button>
						<a href="signup.php" class="btn btn-primary">Sign Up</a>
                    </div>

                    
                    
                    
                    
                </form>
                
                <a href="dashboard/pword.html">Forgot Password?</a>
            </div>
        </div>
</body>
</html>