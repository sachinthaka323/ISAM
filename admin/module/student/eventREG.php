<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/module.css">
<style>
  body{
    background-image: url('2328116.jpg');
  }
  .navbar {
    background: rgb(223,223,235); 
background: linear-gradient(90deg, rgba(223,223,235,1) 0%, rgba(113,59,107,1) 0%, rgba(235,99,214,1) 2%);
  
  
  }
  
  
  .navbar a {
    color: white;
  
  }
  
  .navbar-nav .nav-link:hover {
    color: aqua;
  }
  
  .navbar-brand {
    font-size: 30px;
    padding: 20px;
    /*padding-left: 100px;*/
  
  }

</style>

</head>
<body>
<header id="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../../index.php">ISAMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
     
          </li>
        </ul>
      </div>
  </nav>
</header>

<?php

$conn=new mysqli("localhost","root","","isams");

if ($conn->connect_error){
    die($conn->connect_error);
}




//user id and password

$sql = "select count(id) from users where role='student';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $val = $row["count(id)"];
  $user_id = $val + 1;
  $user_id = "stu000" . $user_id;

  $pass = password_hash($user_id, PASSWORD_DEFAULT);
}


if (
  isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['mail'])
  && isset($_POST['bday']) && isset($_POST['gender']) && isset($_POST['dept']) && isset($_POST['select']) && isset($pass) && isset($user_id)
) {


  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $mail = $_POST['mail'];
  $bday = $_POST['bday'];
  $gender = $_POST['gender'];
  $dept = $_POST['dept'];
  $select = $_POST['select'];
  if (strlen($phone)<10){
    $emailErr = 1;
    $su=0;
  }else{

    $sq = "select batch_name from batch where id='$select';";

    $res = $conn->query($sq);
    if ($res->num_rows > 0) {
      $ro = $res->fetch_assoc();
      $batch_name = $ro['batch_name'];
  
      $sql = "insert into users (user_id,firstname,lastname,phone_no,password,email,bday,gender,department,role,batch_id,batch_name,active)
      values ('$user_id','$fname','$lname','$phone','$pass','$mail','$bday','$gender','$dept','student','$select','$batch_name',1);";
  
      // if ($conn->query($sql) === TRUE) {
      //   $to = "$mail";
      //   $subject = "html code";
      //   $txt = "user name:.$user_id";
      //   $headers = "MIME-Version: 1.0" . "\r\n";
      //   $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
      //   $headers = 'From:,<udithaindunil5@gmail.com>' . "\r\n";
  
  
      //   mail($to, $subject, $txt, $headers);
  
      //   $su=1;
      // }
    }
  }

}


?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">

            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Event Registration Form </h3>
            <?php if (isset($su)) {
              if($su==1){
                ?>
                <div class="alert alert-success alert-dismissible fade show">
                  <strong>Success!</strong> Student Registration sucessfull
                  <button type="button" class="fa fa-times" data-bs-dismiss="alert"></button>
                </div>
              <?php
              }else{
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                  <strong>Success!</strong> Student fail
                  <button type="button" class="fa fa-times" data-bs-dismiss="alert"></button>
                </div>
              <?php
              }

           
            } ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="myForm">
              <div class="row">
                <div class="col mb-4">
                  <div class="form-outline">



                    <label class="form-label" for="form3Example1">First name</label>
                    <input type="text" id="fname" name="fname" class="form-control form-control-lg" required/>

                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form3Example2">Last name</label>
                    <input type="text" id="form3Example2" name="lname" class="form-control form-control-lg" required/>

                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">Phone Number</label>
                    <input type="text" id="firstName" name="phone" class="form-control form-control-lg" required/>
                   <?php if(isset($emailErr)){
                   ?><span style="color: red;"><?php echo "Enter 10 character";?></span><?php
                   }
                   ?>
                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">E-mail</label>
                    <input type="text" id="firstName" name="mail" class="form-control form-control-lg" required/>
                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">Birthday</label>
                    <input type="date" id="firstName" name="bday" class="form-control form-control-lg" required/>
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


             

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit"/>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php
require_once '../include/footer.php';



?>

<!-- <script src="validate.js"></script> -->

</body>

</html>