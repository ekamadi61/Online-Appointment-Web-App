<?php
include('config.php');

if (isset($_POST['submit'])) {
  if (!empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['appointment_date']) && !empty($_POST['appointment_time']) && !empty($_POST['remarks'])) {
    $fname               = $_POST['fname'];
    $email              = $_POST['email'];
    $phone              = $_POST['phone'];
    $age                = $_POST['age'];
    $gender                =$_POST['gender'];
    $appointment_date   = $_POST['appointment_date'];
    $appointment_time   = $_POST['appointment_time'];
    $remarks            = $_POST['remarks'];

    $query = "INSERT INTO bookings(fname, email, phone, age, gender, appointment_date, appointment_time, remarks)" . "VALUES('$fname','$email','$phone','$age', '$gender','$appointment_date','$appointment_time','$remarks')";

    $run = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($run){
     
      $message = 'success';
      header('refresh:3;index.html');
    
    }
  } else {
    $errormsg = 'error';
    echo "all feilds required";
  }
 
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Doc Zone</title>
  <!--form links-->

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <!--js-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  

</head>

<body>
  
  <!--form css-->
  <style>
    html,
    body {
      min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    textarea,
    label,
    p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
    }

    h1 {
      position: absolute;
      margin: 0;
      font-size: 38px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
    }

    textarea {
      width: calc(100% - 12px);
      padding: 5px;
    }

    .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
    }

    form {

      max-width: 65%;
      margin: 20px auto;

      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px #669999;
    }

    .banner {
      position: relative;
      height: 300px;
      background-image: url("assets/bgpics/cloud.jpg");
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2);
      position: absolute;
      width: 100%;
      height: 100%;
    }
    input,
    select,
    textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input {
      width: calc(100% - 10px);
      padding: 5px;

    }

    input[type="date"] {
      padding: 4px 5px;
    }

    textarea {
      width: calc(100% - 12px);
      padding: 5px;
    }

    .item:hover p,
    .item:hover i,
    .question:hover p,
    .question label:hover,
    input:hover::placeholder {
      color: #669999;
    }

    .item input:hover,
    .item select:hover,
    .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0 #669999;
      color: #669999;
    }

    .item {
      position: relative;
      margin: 10px 0;
    }

    .gender input {
      width: auto;
      } 
      .gender label {
      padding: 0 5px 0 0;
      } 

    .item span {
      color: red;
    }

    input[type="date"]::-webkit-inner-spin-button {
      display: none;
    }

    .item i,
    input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a3c2c2;
    }

    .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
    }

    [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
    }


    .flax {
      display: flex;
      justify-content: space-around;
    }

    .btn-block {
      margin-top: 10px;
      text-align: center;
    }

    button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background: #669999;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      margin-bottom: 10px;
    }

    button:hover {
      background: #a3c2c2;
    }

    @media (max-width: 999px) {

      .name-item,
      .city-item {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .name-item input,
      .name-item div {
        width: calc(50% - 20px);
      }

      .name-item div input {
        width: 97%;
      }

      .name-item div label {
        display: block;
        padding-bottom: 5px;
      }
    }
  </style>
  </head>
<!--form-->
  <form action="" method="post" id="form">
    <div class="banner">
      <h1>Online Appointment Booking</h1>
    </div>
    <br />
    <fieldset>
      <legend>Patient Information</legend>
      <div class="item">
        <label for="fname"> Full Name<span>*</span></label>
        <input type="text" name="fname" id="name" required />
      </div>
      <div class="item">
        <label for="email"> email<span>*</span></label>
        <input type="email" name="email" id="email" required />
      </div>

      <div class="item">
        <label for="phone">Phone Number<span>*</span></label>
        <input type="tel" name="phone" id="number" required />
      </div>

      <div class="item">
        <label for="age">Age <span>*</span></label>
        <input type="text" name="age" id="age" required />
      </div>

      
              <label for="Gender">Gender<span>*</span></label>
              <div class="gender">
                <input type="radio" value="male" id="male" name="gender" required/>
                <label for="male" class="radio">Male</label>
                <input type="radio" value="female" id="female" name="gender" required/>
                <label for="female" class="radio">Female</label>
              </div>
            

      <div class="item">
        <label for="date">Date<span>*</span></label>
        <input type="date" name="appointment_date" id="date" required />
        <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
        <label for="time">Time<span>*</span></label>
        <input type="time" name="appointment_time" id="time" required />
        <i class="fas fa-clock-alt"></i>
      </div>

      <div class="item">
        <label for="symptoms">Please describe the reason for this visit </label>
        <textarea id="symptoms" name="remarks" rows="3"></textarea>
      </div>
    </fieldset>


    <div class="btn-block">
      <button type="submit" name="submit" id="btnSubmit">Submit</button>
      
    </div>

    <?php
    if(!empty($message)){
      echo'<script type="text/javascript">
          jQuery(function validation(){
          swal("Thank you for booking with Us", "done", "success");
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
</body>
</html>