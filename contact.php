
  <?php
    include('config.php');
    // Check if User Coming From A Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Assign Variables
        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        
        // Creating Array of Errors
        $formErrors = array();
        if (strlen($user) <= 3) {
            $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> Characters';
        }
        if (strlen($msg) < 10) {
            $formErrors[] = 'Message Can\'t Be Less Than <strong>10</strong> Characters'; 
        }
        
       
        
        $query = "INSERT INTO contact_info(user, mail, cell, msg )"."VALUES('$user','$mail','$cell','$msg')";
		
		$run = mysqli_query($conn,$query) or die(mysqli_error($conn));
		
         if ($run) {
            $message = 'success';
            header('refresh:3;contact.php');
        } else {
             $errormsg = 'error';
             echo "all feilds required";
        }

        // header("Location: contact.php"); // redirect back to your contact form
        //exit;

      
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Doc Zone</title>
        <link rel="stylesheet" href="assets/contact-css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/contact-css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/contact-css/contact.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700,900,900i">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
 
        <link rel="stylesheet" href="assets/css/style1.css">
        <!--sweet alert docs-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
      
    </head>
    <body>
		<header>
      <nav>
        <a class="logo" href="/">DOC ZONE</a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="index.html">Home&nbsp;</a></li>
          <li><a href="service.html">Services</a></li>
         <!-- <li><a href="appointment.php">Book Appointment</a></li>-->
          <li><a href="contact.php">Contact Us</a></li>
		<li><a href="login.php">Sign In</a></li>
        </ul>
      </nav>
    </header>
   

        
        <!-- Start Form -->
        
        <div class="container">
            <h1 class="text-center">Contact Me</h1>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <?php if (! empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php
                        foreach($formErrors as $error) {
                            echo $error . '<br/>';
                        }
                    ?>
                </div>
                <?php } ?>
                <?php if (isset($success)) { echo $success; } ?>
                <div class="form-group">
                    <input 
                           class="username form-control" 
                           type="text" 
                           name="username" 
                           placeholder="Type Your Username"
                           value="<?php if (isset($user)) { echo $user; } ?>" />
                    <i class="fa fa-user fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Username Must Be Larger Than <strong>3</strong> Characters
                    </div>
                </div>
                <div class="form-group">
                    <input 
                           class="email form-control" 
                           type="email" 
                           name="email" 
                           placeholder="Please Type a Valid Email" 
                           value="<?php if (isset($mail)) { echo $mail; } ?>" />
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Email Can't Be <strong>Empty</strong>
                    </div>
                </div>
                <input 
                       class="form-control" 
                       type="text" 
                       name="cellphone" 
                       placeholder="Type Your Cell Phone" 
                       value="<?php if (isset($cell)) { echo $cell; } ?>" />
                <i class="fa fa-phone fa-fw"></i>
                <div class="form-group">
                    <textarea 
                          class="message form-control" 
                          name="message"
                          placeholder="Your Message!"><?php if (isset($msg)) { echo $msg; } ?></textarea>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Message Can\'t Be Less Than <strong>10</strong> Characters
                    </div>
                </div>
                <input 
                       class="btn btn-success" 
                       type="submit" 
                       value="Send Message" />
                <i class="fa fa-send fa-fw send-icon"></i>

                <?php
                    if(!empty($message)){
                    echo'<script type="text/javascript">
                        jQuery(function validation(){
                        swal("Message Sent", "Thank you for Contacting Us!", "success");
                        });
                        </script>';
                        }else{}
                    if(empty($errormsg)){
                    }else{
                    echo'<script type="text/javascript">
                        jQuery(function validation(){
                        swal("Please Fill in correct details", "Fail", "error", {
                        button: "Continue",
                            });
                        });
                    </script>';
                    }
                
                ?>
            </form>
        </div>
        
        <!-- End Form -->
        
        <script src="assets/contact-js/jquery-1.12.4.min.js"></script>
        <script src="assets/contact-js/bootstrap.min.js"></script>
        <script src="assets/contact-js/custom.js"></script>
    
		
	
</body>
	<!-- <script src="assets/js/mobile-navbar.js"></script> -->
</html>
