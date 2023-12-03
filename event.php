<?php

$conn = new mysqli("localhost", "root", "", "isams");

if ($conn->connect_error) {
  die($conn->connect_error);
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
  <link rel="stylesheet" href="event-style.css">

</head>

<html>

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
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href=" " style="color:white;font-weight:600;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./event.php" style="color:white;font-weight:600;">Event</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about.php" style="color:white;font-weight:600;">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="social_work.php" style="color:white;font-weight:600;">Social Work</a>
            </li>
          </ul>
          <a href="./login.php" class="btn" role="button">Voting</a>
        </div>
      </div>
    </nav>
  </header>

  <section id="hero" class="d-flex align-items-center ">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center h-100" data-aos="fade-up" data-aos-delay="200">
          <?php

          $sql = "SELECT * from even_create where special='on' and active=1 ORDER BY id DESC LIMIT 1;";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
                  <h1><?php echo $row['event_name']; ?></h1>
              <h3><?php echo $row['description_1']; ?></h3>
              <h3><?php echo $row['description_2']; ?></h3>
              <div class="d-flex justify-content-center justify-content-lg-start">
                <a href="./login.php" class="btn register" role="button">Registration</a>
              </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img h-100" data-aos="zoom-in" data-aos-delay="200">
          <img src="./admin/module/event/<?php echo $row['upload']; ?>" class="  img-fluid" alt="">
        </div>
    <?php
            }
          }
    ?>
      </div>
    </div>
  </section>


  <section id="values" class="values ">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h1 class="my-5">Internal event</h1>

      </header>

      <div class="row">
        <?php

        $sql = "select * from even_create where active=1;";

        $result = $conn->query($sql);;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($row['permission'] == 'internal') {
        ?>
              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="box">
                  <img src="./admin/module/event/<?php echo $row['upload']; ?>" class="card-img-top img-fluid" alt="">
                  <h1><?php echo $row['event_name']; ?></h1>

                  <h3><?php echo $row['description_1']; ?></h3>
                  <h3><?php echo $row['description_2']; ?></h3>
                  <?php 
                  
                  
                  ?>
                  <a href="eventlogin.php?id=<?php echo $row['id'];?>" class="btn register" role="button">Registration</a>

                </div>
              </div>
        <?php

            }
          }
        }

        ?>


      </div>

    </div>

  </section>
  <section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h1 class="my-5">External & Internal event</h1>

      </header>

      <div class="row">
        <?php

        $sql = "select * from even_create where active=1;";

        $result = $conn->query($sql);;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($row['permission'] == 'both') {
        ?>
              <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="box">
                  <img src="./admin/module/event/<?php echo $row['upload']; ?>" class="img-fluid" alt="">
                  <h1><?php echo $row['event_name']; ?></h1>
                  <h2><?php echo $row['description_1']; ?></h2>
                  <h3><?php echo $row['description_2']; ?></h3>
                  <a href="Event_Registration_form.php?id=<?php echo $row['id'];?>" class="btn register" role="button">Registration</a>

                </div>
              </div>
        <?php

            }
          }
        }

        ?>


      </div>

    </div>

  </section>
  <?php
  require_once './include/footer-page.php';
  ?>

</body>

</html>