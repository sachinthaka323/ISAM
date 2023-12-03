<?php

require_once './admin/connection.php';

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["name"]) && isset($_POST["pass"])) {

    $name = $_POST["name"];
    $pass = $_POST["pass"];

    //   echo $name;
    //   echo $pass;


    // $pass=password_hash($pass,PASSWORD_DEFAULT);  //$2y$10$eM.ONiKpbA3616ydqpkG8eTODnmRhl3TdfwV0nwaku8SCKvGjDrvy
    // echo $pass;

    $mysqli = "SELECT * FROM users WHERE user_id='$name' and active=1";
    $result = $conn->query($mysqli);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        if (password_verify($pass, $row['password'])) {
          if ($row['role'] == 'admin') {
            session_start();

            $_SESSION['user'] = $row['user_id'];
            $_SESSION['login'] = true;
            header("location:./admin/index.php");
          } else {
            if ($row['role'] == 'student') {
              session_start();

              $_SESSION['user']=$row['user_id'];
              $_SESSION['login']=true;
              header("location:pages/voting.php");
            }
          }
        } else {

          $error = 1;
        }
      }
    } else {

      $error = 1;
    }
  }
}




?>


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
  <link rel="stylesheet" href="style.css">
  


</head>

<body>

  <section class="vh-100 new">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="./images/3911318.jpg" class="img-fluid">

        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label fw-bold" for="form3Example3">User Name</label>

              <input type="text" id="form3Example3" name="name" class="form-control form-control-lg" placeholder="Enter Username " require />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-3 fw-bold">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" name="pass" class="form-control form-control-lg" placeholder="Enter password" require />
            </div>
            <?php
            if (isset($error)) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong> Invalid user name or password
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php


            } ?>
            <div class="d-flex justify-content-between align-items-center">


              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              </div>

          </form>
        </div>
      </div>
    </div>

  </section>

</body>

</html>