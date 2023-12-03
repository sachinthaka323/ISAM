<?php
$conn=new mysqli("localhost","root","","isams");

if ($conn->connect_error){
    die($conn->connect_error);
}
session_start();



if (!isset($_SESSION['user']) && !isset($_SESSION['login'])) {
  header("location:../../../index.php");
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
  <!-- <link rel="stylesheet" href="./css/pagec.css">
 -->
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Roboto&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="voting.css">

</head>

<body>
</body>

<!--header and navigation bar-->
<header id="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">ISAMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a href="../logout.php" class="sign"><h5>sign out</h5> <i class="bi bi-box-arrow-right"></i></a>
          </li>
        </ul>
      </div>
  </nav>
</header>
<div class="box">
                        <h1>Lined Up Votes</h2>
                    </div>

<section id="hero">

  <?php

  $x = $_SESSION['user'];



  $sql = "SELECT batch_id FROM users WHERE user_id = '$x';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $batch_id = $row["batch_id"];
  }


  $y = "SELECT id, name,date,stime,etime FROM voting_create WHERE batch_id = '$batch_id';";

  $result = $conn->query($y);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $id = $row["id"];
      $name = $row["name"];
      $date = $row["date"];
      $time = $row["stime"];
  ?>


                    
<div class="card text-body  mb-3 card mx-3 my-3" style="width:18rem; display:inline-block">   
      
      <div class="card l-bg-blue-dark">
          <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
              <div class="mb-4">
              <div class="card-header"><?php echo $name?></div>
                  <p class="card-text">Start Date : <?php echo $date; ?></p>
                  <p class="card-text">Start time : <?php echo $row['stime']; ?></p>
                  <p class="card-text">End Date : <?php echo $row['etime']; ?></p>

                  <a href="vote.php?id=<?=$id?>" class="btn btn-primary">vote</a>
              </div>
          </div>
      </div>
  </div>

          </div>
        </div>
      </div>

</div>
  <?php


    }
  }

  ?>
 



</section>
</body>

</html>


