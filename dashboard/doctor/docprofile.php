<?php
session_start();

if (!isset($_SESSION['docname'])) {
  header("Location: doctorlogin.php");
}
include('config.php');
if (isset($_POST['update'])) {
  if (!empty($_POST['username']) && !empty($_POST['specialty']) && !empty($_POST['address']) && !empty($_POST['contact']) && !empty($_POST['rate']) & !empty($_POST['hours'])) {
    $id = $_POST['update_id'];
    $username = $_POST['username'];
    $specialty = $_POST['specialty'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $rate = $_POST['rate'];
    $hours = $_POST['hours'];

    $query = "UPDATE doctors SET username ='$username', specialty = '$specialty', address = '$address', contact = '$contact', rate = '$rate', hours = '$hours' WHERE id ='$id';";
    $results = mysqli_query($conn, $query);
    if ($results) {
      $message = 'success';
      header('refresh:3;docprofile.php');
      exit();
    } else {
      $errormsg = 'error';
      echo "all feilds required";
    }
  } else {
    echo "all fields required";
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
    body {
      margin: 0;
      /* padding-top: 40px; */

      color: #2e323c;
      background: #f5f6fa;
      position: relative;
      height: 100%;
    }

    .account-settings .user-profile {
      margin: 0 0 1rem 0;
      padding-bottom: 1rem;
      text-align: center;
    }

    .account-settings .user-profile .user-avatar {
      margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
      width: 90px;
      height: 90px;
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
      margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
      margin: 0;
      font-size: 0.8rem;
      font-weight: 400;
      color: #9fa8b9;
    }

    .account-settings .about {
      margin: 2rem 0 0 0;
      text-align: center;
    }

    .account-settings .about h5 {
      margin: 0 0 15px 0;
      color: #007ae1;
    }

    .account-settings .about p {
      font-size: 0.825rem;
    }

    .form-control {
      border: 1px solid #cfd1d8;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      font-size: .825rem;
      background: #ffffff;
      color: #2e323c;
    }

    .card {
      background: #ffffff;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      border: 0;
      margin-bottom: 1rem;
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
          <img src="../img/success.png">
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
        <a class="nav-link" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
          </div>

          <!-- Content Row -->
          <?php

          include "config.php"; // Using database connection file here

          $records = mysqli_query($conn, "SELECT *from doctors WHERE id =1"); // fetch data from database

          while ($data = mysqli_fetch_array($records)) {
          ?>

            <div class="container">
              <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="account-settings">
                        <div class="user-profile">
                          <div class="user-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                          </div>
                          <h5 class="user-name"><b>DR:</b><?php echo " " . $_SESSION['docname'] . ""; ?></h5>
                          <!-- <h6 class="user-email">yuki@Maxwell.com</h6> -->
                        </div>
                        <div class="about">
                          <h5>About</h5>
                          <p>Doc Zone offers world class practioner care by giving you value for your money.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id" value="<?php echo $data['id'] ?>">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name" value="<?php echo $data['username']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="specialty">Specialty</label>
                            <select class="form-control" name="specialty" value="<?php echo $data['specialty']; ?>">
                              <option selected><?php echo $data['specialty']; ?></option>
                              <option value="Physician">Physician</option>
                              <option value="Surgeon">Surgeon</option>
                              <option value="Cardiologist">Cardiologist</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $data['address']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="Contact">Contact</label>
                            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" value="<?php echo $data['contact']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <h6 class="mt-3 mb-2 text-primary">Other Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="Rate">Hourly Rate</label>
                            <input type="text" class="form-control" id="rate" name="rate" placeholder="Hourly Rate" value="<?php echo $data['rate']; ?>">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="Hours">Working Hours</label>
                            <select class="form-control" name="hours" value="<?php echo $data['hours']; ?>">
                              <option selected><?php echo $data['hours']; ?></option>
                              <option value="8:00-11:00 AM">8:00-11:00 AM</option>
                              <option value="9:00-12:00 PM">9:00-12:00 PM</option>
                              <option value="2:00-4:00 PM">2:00-4:00 PM</option>
                            </select>
                          </div>

                        </div>
                      <?php
                    }
                      ?>
                      <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="text-right">
                            <button type="button" id="submit" name="submit" class="btn  btn-sm btn-danger">Delete</button>
                            <!--update modal-->
                            <button type="button" id="submit" name="submit" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Update</button>
                            <!--modal-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="docprofile.php" method="post">
                                      <input type="hidden" id="update_id" name="update_id">
                                      <div class="modal-body">
                                        <div class="form-group">
                                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter full name">
                                        </div>
                                        <div class="form-group">

                                          <select class="form-control" name="specialty">
                                            <option selected>Specialty</option>
                                            <option value="Physician">Physician</option>
                                            <option value="Surgeon">Surgeon</option>
                                            <option value="Cardiologist">Cardiologist</option>
                                          </select>
                                        </div>
                                        <div class="form-group">

                                          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group">

                                          <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact">
                                        </div>
                                        <div class="form-group">

                                          <input type="text" class="form-control" id="rate" name="rate" placeholder="Enter Rate">
                                        </div>
                                        <div class="form-group">

                                          <select class="form-control" name="hours">
                                            <option selected>Working Hours</option>
                                            <option value="8:00-11:00 AM">8:00-11:00 AM</option>
                                            <option value="9:00-12:00 PM">9:00-12:00 PM</option>
                                            <option value="2:00-4:00 PM">2:00-4:00 PM</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                      </div>

                                      <?php
                                      if (!empty($message)) {
                                        echo '<script type="text/javascript">
                                                jQuery(function validation(){
                                                swal("Profile Updated!", "done", "success");
                                                });
                                                </script>';
                                      } else {
                                      }
                                      if (empty($errormsg)) {
                                      } else {
                                        echo '<script type="text/javascript">
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
                            <!--end of modal-->
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