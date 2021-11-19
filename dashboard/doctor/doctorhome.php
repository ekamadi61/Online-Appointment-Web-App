<?php
session_start();

if (!isset($_SESSION['docname'])) {
  header("Location: doctorlogin.php");
}
include('config.php');
if (isset($_POST['submit'])) {
    if (!empty($_POST['username'])  && !empty($_POST['contact']) && !empty($_POST['address']) && !empty($_POST['bloodgroup']) && !empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['temperature']) && !empty($_POST['weight']) && !empty($_POST['symptoms']) && !empty($_POST['diagnosis']) && !empty($_POST['prescription'])) {
        $username                 = $_POST['username'];
        $contact                  = $_POST['contact'];
        $address                  = $_POST['address'];
        $bloodgroup               = $_POST['bloodgroup'];
        $age                      = $_POST['age'];
        $gender                   = $_POST['gender'];
        $temperature              = $_POST['temperature'];
        $weight                   = $_POST['weight'];
        $symptoms                 = $_POST['symptoms'];
        $diagnosis                = $_POST['diagnosis'];
        $prescription             = $_POST['prescription'];


        $query = "INSERT INTO patients(username,  contact, address, bloodgroup, age, gender, temperature, weight, symptoms,diagnosis,prescription)" . "VALUES('$username','$contact','$address','$bloodgroup','$age','$gender','$temperature', '$weight', '$symptoms', '$diagnosis', '$prescription')";

        $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($run) {
            $message = 'success';
            header('refresh:3;doctorhome.php');
        } else {
            $errormsg = 'error';
            echo "all feilds required";
        }
    } else {
        echo "all feilds required";
    }

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
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!--sweet alert docs-->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--maps-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


    

    <style>
        .icon-cards .card {
            display: inline-block;
            display: flex-column;
            margin: 125px;
            padding-top: .5rem;
            padding-left: .5rem;
            padding-right: .5rem;
            padding-bottom: .1rem;
        }
       
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
    
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
 }
</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="doctorhome.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Doc Zone</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="doctorhome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="docprofile.php">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Profile</span>
                </a>

            </li>

            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="doctorappointment.php">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Bookings</span>
                </a>

            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            

            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="records.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Patient Records</span></a>
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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="docprofile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="doclogout.php" data-toggle="modal" data-target="#logoutModal">
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        <p><b>Welcome Dr:</b><?php echo " " . $_SESSION['docname'] . "";?></p>
                    </div>

                    <!-- Content Row -->
                    <div class="container-cards">
                        <div class="row">
                            <div class="col-md-4 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Number of Patient Records</h6>
                                        <h2 class="text-right"><i class="fa fa-user-plus f-left"></i><span></span></h2>
                                        <p class="m-b-0"><span class="f-right"><?php 
                                        include 'config.php';
                                        $sql="select count('*') from patients";
                                        $result=mysqli_query($conn,$sql);
                                        $row=mysqli_fetch_array($result);
                                        echo "<h3>$row[0]</h3>";
                                        mysqli_close($conn);
                                        ?></span></p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-4 col-xl-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20"> Number of active appointments</h6>
                                        <h2 class="text-right"><i class="fa fa-calendar f-left"></i><span></span></h2>
                                        <p class="m-b-0"><span class="f-right"><?php 
                                        include 'config.php';
                                        $sql="select count('*') from bookings";
                                        $result=mysqli_query($conn,$sql);
                                        $row=mysqli_fetch_array($result);
                                        echo "<h3>$row[0]</h3>";
                                        mysqli_close($conn);
                                        ?></span></p></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="icon-cards">
                            <div class="card" style="width: 10rem;">
                                <img class="card-img-top" src="../img/medical-checkup.png" alt="Card image cap">
                                <div class="card-body">


                                    <a href="doctorappointment.php" class="btn btn-primary">View Bookings</a>
                                </div>
                            </div>

                            <div class="card" style="width: 10rem;">
                                <img class="card-img-top" src="../img/report1.png" alt="Card image cap">
                                <div class="card-body">
                                    <a href="records.php" class="btn btn-primary">View Records</a>
                                </div>

                                
                               
                            </div>

                            <div class="card" style="width: 10rem;">
                                <img class="card-img-top" src="../img/add-file.png" alt="Card image cap">
                                <div class="card-body">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Add Record
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="doctorhome.php" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Patient full name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="tel" class="form-control" id="contact" name="contact" placeholder="contact">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <select class="form-control" name="bloodgroup">
                                                                    <option selected>Blood group</option>
                                                                    <option value="A">A</option>
                                                                    <option value="B">B</option>
                                                                    <option value="AB">AB</option>
                                                                    <option value="O">O</option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="age" name="age" placeholder=" Enter Age">
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" name="gender">
                                                                    <option selected>Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="temp" name="temperature" placeholder="Enter Temperature">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter Weight">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="symptoms" name="symptoms" placeholder="Enter symptoms">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Enter Diagnosis">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="pres" name="prescription" placeholder="Enter Prescription">
                                                            </div>


                                                          

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="submit">Add Record</button>
                                                        </div>


                                                        <?php
                                                            if(!empty($message)){
                                                            echo'<script type="text/javascript">
                                                                jQuery(function validation(){
                                                                swal("New Record Added!", "done", "success");
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

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>
                </div>
               

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
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="doclogout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../js/sb-admin-2.min.js"></script>


</body>


</html>