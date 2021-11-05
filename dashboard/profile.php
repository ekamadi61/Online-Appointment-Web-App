<?php
   
//session_start();

//if (!isset($_SESSION['username'])) {
 // header("Location: login.php");
//}

include('config.php');
if(isset($_POST['submit']))
{
	if(!empty($_POST['fname']) && !empty($_POST['sname']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['address']))
	{					 	
				$fname 				= $_POST['fname'];
				$sname 					= $_POST['sname'];
				$phone			    = $_POST['phone'];
				$email			    = $_POST['email'];
				$address			    = $_POST['address'];
				

		$query = "INSERT INTO userProfile(fname, sname, phone, email, address)"."VALUES('$fname','$sname','$phone','$email','$address')";
		
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

		header("Location: profile.php"); // redirect back to your contact form
        exit;

		$conn->close();
	}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doc Zone Dash</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	
	
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
								 <style>body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Doc Zone Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Profile</span>
                </a>
              
            </li>
			
			 <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="appointments.php">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Bookings</span>
                </a>
              
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="doctors.php">
                    <i class="fas fa-fw fa-hospital-user"></i>
                    <span>Doctors</span>
                </a>
              
            </li>
			
			 <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="messages.php">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Messages</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                         

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>


                  <body oncontextmenu='return false' class='snippet-body'>
                                <div class="container rounded bg-white mt-5 mb-5">
											<div class="row">
												<div class="col-md-3 border-right">
													<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php //echo " " . $_SESSION['username'] . ""; ?></span><span class="text-black-50"><?php //echo " " . $_SESSION['email'] . ""; ?></span><span> </span></div>
												</div>
											<div class="col-md-5 border-right">
												<div class="p-3 py-5">
													<div class="d-flex justify-content-between align-items-center mb-3">
														<h4 class="text-right">Profile Settings</h4>
													</div>
													
													<?php

													include "config.php"; // Using database connection file here

													$records = mysqli_query($conn,"select *from userprofile ORDER BY id DESC LIMIT 1"); // fetch data from database

													while($data = mysqli_fetch_array($records))
													{
													?>
													
													<div class="row mt-2">
														<div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control"  value="<?php echo $data['fname']; ?>"></div>
														<div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="<?php echo $data['sname']; ?>"></div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control"  value="<?php echo $data['phone']; ?>"></div>
													   
														
													   
														<div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control"  value="<?php echo $data['email']; ?>"></div>
														
													</div>
													<div class="row mt-3">
														<div class="col-md-6"><label class="labels">Address</label><input type="text" class="form-control"  value="<?php echo $data['address']; ?>"></div>
														<?php
													}
														?>
														<?php mysqli_close($conn); // Close connection ?>
														
													</div>
													<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" data-toggle="modal" data-target="#exampleModal">Edit Profile</button></div>
													
													

													<!-- Modal -->
													<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
													<div class="modal-content">
													<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
													</div>
													<div class="modal-body">
													<form action="profile.php" method="post">
													<div class="modal-body">
													<div class="form-group">
												
													<input type="text" class="form-control" id="username" name="fname" placeholder="Enter first name">
												
													</div>
													<div class="form-group">
												
													<input type="text" class="form-control" id="surname" name="sname" placeholder="Surname">
													</div>
													<div class="form-group">
														
													<input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
													</div>
													<div class="form-group">
												
													<input type="email" class="form-control" id="email" name="email" placeholder="Email">
													</div>
											  
													<div class="form-group">
													<input type="text" class="form-control" id="address" name="address" placeholder="Address">
													</div>
											  
													</div>
											
													<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
													</div>
											
											</form>
										</div>
										
									</div>
								  </div>
								</div>
													
												</div>
											</div>
											<div class="col-md-4">
												<div class="p-3 py-5">
													<div class="d-flex justify-content-between align-items-center profile"><span class="border px-3 p-1 add-experience"><i class="fa fa-trash"></i>&nbsp;Delete Profile</span></div><br>
													<div class="d-flex justify-content-between align-items-center profile"><span class="border px-3 p-1 add-experience" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-lock-open"></i>&nbsp;Change Password</span></div><br>
													
													

													<!-- Modal -->
													<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													  <div class="modal-dialog" role="document">
														<div class="modal-content">
														  <div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															  <span aria-hidden="true">&times;</span>
															</button>
														  </div>
														  <div class="modal-body">
															<form action="profile.php" method="post">
															<div class="modal-body">
															<div class="form-group">
														
															<input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
														
															</div>
															<div class="form-group">
														
															<input type="password" class="form-control" id="password-repeat" name="password-repeat" placeholder="Repeat Password">
															</div>
															
															</div>
													
															<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
															</div>
													
															</form>
														  </div>
														  
														</div>
													  </div>
													</div>
													
											</div>
										</div>
									</div>
									</div>

                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'></script>
                               <!-- </body>-->

                    <!-- Content Row -->

                    <div class="row">

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>