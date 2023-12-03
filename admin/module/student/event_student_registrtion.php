<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISAMS</title>
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="../css/module.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .navbar {
      background: rgb(223, 223, 235);
      background: linear-gradient(90deg, rgba(223, 223, 235, 1) 0%, rgba(113, 59, 107, 1) 0%, rgba(235, 99, 214, 1) 2%);

    }

    .navbar .nav-item {
      font-size: 25px;
      padding: 15px;
      font-family: 'Roboto', sans-serif;

    }

    .navbar a {
      color: white;
    }
  </style>
</head>

<body>
  <?php

  session_start();

  $conn = new mysqli("localhost", "root", "", "isams");

  if ($conn->connect_error) {
    die($conn->connect_error);
  }

  $id = $_SESSION['user'];
  $eid = $_SESSION['eid'];



  // if (isset($_GET['id'])) {
  //   $id = $_GET['id'];
  //   $_SESSION['uid'] = $id;
  //   //
  //   //user id and password

  $sql = "select * from users where user_id='$id' and active=1;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //   $val = $row["count(id)"];
    //   $user_id = $val + 1;
    //   $user_id = "stu000" . $user_id;

    //   $pass = password_hash($user_id, PASSWORD_DEFAULT);

    //abc.php?id=<?php echo $id
  ?>



    <!--header and navigation bar-->
    <header id="header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="../../../index.php" style="color:white;font-weight:bold;">ISAMS</a>
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

                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Student Registration Form </h3>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="row">
                    <div class="col mb-4">
                      <div class="form-outline">

                        <label class="form-label" for="form3Example1">First name</label>
                        <input type="text" id="form3Example1" name="fname" class="form-control form-control-lg" value=<?php echo $row['firstname']; ?>>

                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example2">Last name</label>
                        <input type="text" id="form3Example2" name="lname" class="form-control form-control-lg" value=<?php echo $row['lastname']; ?>>

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="firstName">Phone Number</label>
                        <input type="text" id="firstName" name="phone" class="form-control form-control-lg" value=<?php echo $row['phone_no']; ?>>
                      </div>

                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="firstName">E-mail</label>
                        <input type="text" id="firstName" name="mail" class="form-control form-control-lg" value=<?php echo $row['email']; ?>>
                      </div>

                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">

                      <div class="form-outline">
                        <label class="form-label" for="firstName">Birthday</label>
                        <input type="date" id="firstName" name="bday" class="form-control form-control-lg" value=<?php echo $row['bday']; ?>>
                      </div>

                    </div>

                  </div>
                  <div>
                    Gender
                  </div>

                  <?php
                  if ($row['gender'] == 'male') {
                  ?>
                    <div class="row">
                      <div class="col-md-6 mb-4">


                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault2" checked>
                          Male
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2">
                          Female
                        </div>
                      </div>
                    </div>

                  <?php
                  }

                  ?>

                  <?php
                  if ($row['gender'] == 'female') {
                  ?>
                    <div class="row">
                      <div class="col-md-6 mb-4">


                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault2">
                          Male
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" checked>
                          Female
                        </div>
                      </div>
                    </div>

                  <?php
                  }

                  ?>

                  <!--departmants-->
                  <div>Departmant</div>

                  <?php
                  if ($row['department'] == 'ICT') {
                  ?>
                    <div class="row">
                      <div class="col-md-3">

                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ICT" id="flexRadioDefault2" checked>
                          ICT
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ET" id="flexRadioDefault2">
                          ET
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="AT" id="flexRadioDefault2">
                          AT
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="IAT" id="flexRadioDefault2">
                          IAT
                        </div>
                      </div>
                    </div>

                  <?php
                  }
                  ?>
                  <?php
                  if ($row['department'] == 'ET') {
                  ?>
                    <div class="row">
                      <div class="col-md-3">

                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ICT" id="flexRadioDefault2">
                          ICT
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ET" id="flexRadioDefault2" checked>
                          ET
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="AT" id="flexRadioDefault2">
                          AT
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="IAT" id="flexRadioDefault2">
                          IAT
                        </div>
                      </div>
                    </div>

                  <?php
                  }
                  ?>

                  <?php
                  if ($row['department'] == 'AT') {
                  ?>

                    <div class="row">
                      <div class="col-md-3">

                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ICT" id="flexRadioDefault2">
                          ICT
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ET" id="flexRadioDefault2" checked>
                          ET
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="AT" id="flexRadioDefault2">
                          AT
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="IAT" id="flexRadioDefault2">
                          IAT
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <?php
                  if ($row['department'] == 'IAT') {
                  ?>

                    <div class="row">
                      <div class="col-md-3">

                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ICT" id="flexRadioDefault2">
                          ICT
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="ET" id="flexRadioDefault2">
                          ET
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="AT" id="flexRadioDefault2">
                          AT
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="radio" name="dept" value="IAT" id="flexRadioDefault2" checked>
                          IAT
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <div>
                    Batch
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-8">
                      <select class="form-select" name="select" aria-label="Default select example">
                        <option value=''><?php echo $row['batch_name']; ?></option>
                        <?php

                        $sql = "select * from batch;";

                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                          echo "<option value='$row[id]'>$row[batch_name]</option>";
                        }

                        ?>

                      </select>

                    </div>
                  </div>

                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>

</html>



<?php
  }
?>

<?php
// echo $_POST['lname'];
if (isset($_POST['submit'])&& isset($_POST['mail'])) {
 
  //     // echo   $_SESSION['uid'];
  $id = $_SESSION['user'];
  $eid = $_SESSION['eid'];
  $sq = "select id,email from users where user_id='$id' and active=1;";
  $result = $conn->query($sq);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $s="select event_name from even_create where id='$eid';";
    $re=$conn->query($s);
    if($re->num_rows>0){
      $r=$re->fetch_assoc();
      $en= $r['event_name'];
      $mail= $row['email'];
      $sql = "INSERT INTO event_regstration (event_id,user_no) VALUES ('$eid', '$user_id');";
      if ($conn->query($sql) === TRUE) {
        $to = "$mail";
        $subject = "Intergrated Student Activity Management System";
        $txt = "you registration.$en. event successfull...";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = 'From:,<udithaindunil5@gmail.com>' . "\r\n";
  
  
        mail($to, $subject, $txt, $headers);
  
  // ?>
        <script>
          Swal.fire(
            'Registration Success!',
            'Check your mail...',
            'success'
          ).then((result) => {
          if (result.isConfirmed) {
            window.location = "../../../index.php";
          }
        })
  //       </script><?php
    }

   ?>

<?php
    } else {
      echo "Error" . $conn->error;
    }
  }
}

?>
<script></script>
<?php
require_once '../include/footer.php';


?>