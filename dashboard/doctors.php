<?php 
include('config.php');
session_start();
    
    if(isset($_POST['save'])){
        $id = $_POST['update_id'];
        $username = $_POST['username'];
        $specialty = $_POST['specialty'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $rate    = $_POST['rate'];
        $hours = $_POST['hours'];
       
        $query = "UPDATE doctors SET username='$username', specialty ='$specialty', contact ='$contact', address='$address', rate = '$rate', hours = '$hours' WHERE id ='$id'";
        $run = mysqli_query($conn, $query);
        if($run){
            $_SESSION['status'] = "Record updated Successfuly";
            header("location: doctors.php");
            exit();
        }
    }

    //delete script
        if(isset($_POST['delete'])){
        $id = $_POST['delete_id'];
        $query = "DELETE FROM doctors WHERE id ='$id'";
        $run = mysqli_query($conn, $query);
        if($run){
            $_SESSION['status'] = "Record deleted Successfuly";
            header("location: doctors.php");
            exit();
        }
    }

    //add doctor user
    if(isset($_POST['done'])){
        $docname 				= $_POST['docname'];
		$password			    = $_POST['password'];
		       
        $query = "INSERT INTO doctorusers(docname, password)"."VALUES('$docname','$password')";
        $run = mysqli_query($conn,$query) or die(mysqli_error($conn));
        if($run){
            $message = 'success';
            header('refresh:3;doctors.php');
            exit();
        }else{
            $errormsg = 'error';
            echo "all feilds required";
         }      
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
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--sweet alert js-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
    h1{
        font-size:20px;
        text-align: center;
    }
    
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="img/success.png">
                </div>
                <div class="sidebar-brand-text mx-3">Doc Zone Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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
                    <i class="fas fa-fw fa-hospital"></i>
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " " . $_SESSION['username'] . "";?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
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
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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
                        <h1 class="h3 mb-0 text-gray-800">Doctors</h1>
                        <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-user fa-sm text-white-50"></i> Add Doctor User</a>
                    </div>
                      <!-- Add doctor user Modal -->
                      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="doctors.php" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="username" name="docname" placeholder="username">
                                                                </div>
                                                                <div class="form-group">

                                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">

                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="done">Save changes</button>
                                                            </div>

                                                            <?php
                                                            if(!empty($message)){
                                                            echo'<script type="text/javascript">
                                                                jQuery(function validation(){
                                                                swal("User addded Succesfully!", "done", "success");
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
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Doctor Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                            if(isset($_SESSION['status'])){?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['status']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                <?php
                                unset($_SESSION['ststus']);
                            }
                            ?>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Specialty</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Hourly Rate</th>
                                            <th>Working Hours</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php

                                        include "config.php"; // Using database connection file here

                                        $records = mysqli_query($conn, "select * from doctors"); // fetch data from database

                                        while ($data = mysqli_fetch_array($records)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $data['id']; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['specialty']; ?></td>
                                                <td><?php echo $data['address']; ?></td>
                                                <td><?php echo $data['contact']; ?></td>
                                                <td><?php echo $data['rate'];?></td>
                                                <td><?php echo $data['hours']; ?></td>
                                                <td>
                                                <!--edit button modal-->
                                                <button type="button" class="btn btn-success editbtn"  name="edit"><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="doctors.php" method="post">
                                                        <input type="hidden" class="form-control" name="update_id" id="update_id">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="update_username" name="username" placeholder="Enter Doctor full name">
                                                            </div>
                                                            <div class="form-group">

                                                                <select class="form-control" name="specialty" id="update_specialty">
                                                                    <option selected>Specialty</option>
                                                                    <option value="Physician">Physician</option>
                                                                    <option value="Surgeon">Surgeon</option>
                                                                    <option value="Cardiologist">Cardiologist</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="update_address" name="address" placeholder="Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="tel" class="form-control" id="update_contact" name="contact" placeholder="contact">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="update_rate" name="rate" placeholder="Hourly rate">
                                                            </div>

                                                            <div class="form-group">

                                                                <select class="form-control" name="hours" id="update_hours">
                                                                    <option selected>Working Hours</option>
                                                                    <option value="8:00 - 11:00 AM">8:00 - 11:00 AM</option>
                                                                    <option value="9:00 - 12:00 PM">9:00 - 12:00 PM</option>
                                                                    <option value="2:00 - 4:00 PM">2:00 - 4:00 PM</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="save">Save </button>
                                                    </div>

                                                    </form>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                                <!--delete button-->
                                                <button type="button" class="btn btn-danger deletebtn" name="delete" data-toggle="modal" data-target="#exampleModal2"><i class="far fa-trash-alt"></i></button>
                                                <!-- Modal -->
                                        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <div class="modal-body">
                                                    <form action="doctors.php" method="post">
                                                        <input type="hidden" class="form-control" name="delete_id" id="delete_id">
                                                                <h1>Do you want to delete this record?</h1>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary" name="delete">Ok</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                                </td>

                                            </tr>
                                           
                                        <?php
                                        }
                                        ?>
                                </table>
                               

                                <?php mysqli_close($conn); // Close connection 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function(){
            $(document).on('click','.editbtn',function(){
                $('#editmodal').modal('show');
                $tr=$(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#update_id').val(data[0]);
                $('#update_username').val(data[1]);
                $('#update_specialty').val(data[2]);
                $('#update_contact').val(data[3]);
                $('#update_address').val(data[4]);
                $('#update_rate').val(data[5]);
                $('#update_hours').val(data[6]);
               
            });
        });

    </script>

<script>
        $(document).ready(function(){
            $(document).on('click','.deletebtn',function(){
                $('#deletemodal').modal('show');
                $tr=$(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);          
            });
        });

</script>
      
</body>

</html>