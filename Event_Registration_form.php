<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISAMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="style.css">

</head>


<?php


$conn = new mysqli("localhost", "root", "", "isams");

if ($conn->connect_error) {
  die($conn->connect_error);
}

?>

<body>


  <!--header and navigation bar-->
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="./index.php" style="color:white;font-weight:bold;">ISAMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">


        </div>
      </div>
    </nav>
  </header>


  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">

              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Event Registration Form </h3>

              <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" name="myForm">
                <div class="row">
                  <div class="col mb-4">
                    <div class="form-outline">



                      <label class="form-label" for="form3Example1">First name</label>
                      <input type="text" id="fname" name="fname" class="form-control form-control-lg" required />

                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="form3Example2">Last name</label>
                      <input type="text" id="form3Example2" name="lname" class="form-control form-control-lg" required />

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="firstName">Phone Number</label>
                      <input type="text" id="firstName" name="phone" class="form-control form-control-lg" required />
                   
                    </div>

                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="firstName">E-mail</label>
                      <input type="text" id="firstName" name="mail" class="form-control form-control-lg" required />
                    </div>

                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="firstName">Birthday</label>
                      <input type="date" id="firstName" name="bday" class="form-control form-control-lg" required />
                    </div>

                  </div>

                </div>
                <div>
                  Gender
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">


                    <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault2" required>
                      Male
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" required>
                      Female
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="firstName">University name</label>
                      <input type="text" id="firstName" name="uname" class="form-control form-control-lg" required />
                    </div>

                  </div>
                </div>

                <div class="mt-4 pt-2">
                  <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </div>


<?php

if (isset($_GET['id'])&&isset($_POST['fname'])&& isset($_POST['lname'])&& isset($_POST['phone'])&&isset($_POST['mail'])&&isset($_POST['bday'])&&isset($_POST['uname'])&&isset($_POST['gender'])) {
  $id=$_GET['id'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $phone=$_POST['phone'];
  $bday=$_POST['bday'];
  $mail=$_POST['mail'];
  $uname=$_POST['uname'];
  $gender=$_POST['gender'];

  $insert = "INSERT INTO event_regstration (firstname, lastname, phone_no, email, bady, gender, university_name, event_id, user_no) VALUES ('$fname', '$lname', '$phone', '$mail', '$bday','$gender' ,'$uname','$id',0)";

  if($conn -> query($insert)==TRUE){

    
    $to = "$mail";
    $subject = "Intergrated Student Activity Management System";
    $txt = "you registration event successfull...";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers = 'From:,<udithaindunil5@gmail.com>' . "\r\n";


    mail($to, $subject, $txt, $headers);
    ?><script>
    Swal.fire(
      'Registration Success!',
      'Check your mail...',
      'success'
    ).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php";
    }
  })
//       </script><?php
    

  }else{
    echo "error".$conn->error;
  }
  ?>
  
  
  <?php


}


?>




</body>

</html>