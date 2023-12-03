<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/pagec.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<body onload="myFunction()">


  <?php
  $conn = new mysqli("localhost", "root", "", "isams");

  if ($conn->connect_error) {
    die($conn->connect_error);
  }
  session_start();
  date_default_timezone_set('Asia/colombo');
  if (!isset($_SESSION['user']) && !isset($_SESSION['login'])) {
    header("location:../../../index.php");
  }
  $uid = $_SESSION['user'];
  $vid = $_GET['id'];
  $tt = date("H:i");
  $today = date("Y-m-d");
  $sql = "select date,stime,etime from voting_create where id='$vid';";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    if ($today == $row['date'] && (strtotime($tt) > strtotime($row['stime']) && strtotime($row['etime']) > strtotime($tt))) {
    
    } else {
  ?>

      <script>
        Swal.fire(
          'Voting is not allowed for this moment..!',

        ).then((result) => {
          if (result.isConfirmed) {
            window.location = "voting.php";
          }
        })
        // window.location="voting.php";
      </script>

    <?php
    }
  }






  $sql = "select student_id,voting_id from voting_result where student_id='$uid' and voting_id='$vid';";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) {
    ?>

    <script>
      Swal.fire(
        'Already vote..!',

      ).then((result) => {
        if (result.isConfirmed) {
          window.location = "voting.php";
        }
      })
      // window.location="voting.php";
    </script>

  <?php
  }

  ?>


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
              <a href="../logout.php" class="sign">
                <h5>sign out</h5> <i class="bi bi-box-arrow-right"></i>
              </a>
            </li>
          </ul>
        </div>
    </nav>
  </header>
  <div class="main">
    <div class="thankyou-page">
      <div class="_header">

        </h1>
      </div>
      <div class="_body">
        <div class="_box">
          <h1>Voting System</h2>
        </div>
      </div>
    </div>

    <div id="timer" class="timer"></div>

    <!-- count down timer -->
    <script>
      let startTime = 2;
      let time = startTime * 60;
      //Get the Storage time 
      var min = Number(localStorage.getItem("minute"));
      var sec = Number(localStorage.getItem("seconds"));
      var sTime = min * 60 + sec;
      var timer = document.getElementById("timer");

      function myFunction() {
        console.log(time);
        if (time > 0) {
          //Identify the Broswer Refresh or not
          let data = window.performance.getEntriesByType("navigation")[0].type;
          if (data == "reload") {
            console.log(time);
            min = Math.floor(sTime / 60);
            sec = sTime % 60;
            min = min < 10 ? "0" + min : min;
            localStorage.setItem("minute", min);
            localStorage.setItem("seconds", sec);

            timer.innerHTML = `voting time end:${min}:${sec}`;
            sTime--;
          } else {
            let minute = Math.floor(time / 60);
            let seconds = time % 60;

            minute = minute < 10 ? "0" + minute : minute;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            localStorage.setItem("minute", minute);
            localStorage.setItem("seconds", seconds);

            timer.innerHTML = `voting time end:${minute}:${seconds}`;
            time--;

            localStorage.setItem("timer", timer.innerHTML);
          }
        } else {
          // console.log("udith");
          window.location = "../index.php";

        }


      }
      setInterval(myFunction, 1000);
    </script>

    <div id="total" align="center"></div>

    <section id="hero">
      <?php

      $x = $_SESSION['user'];

      if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $_SESSION['vid'] = $id;



        $sql = "select candidate.id,users.firstname,users.lastname from users,candidate where users.id=candidate.user_id and candidate.voting_id='$id';";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {

      ?>

            <div id="ti" style="width: 24rem; display:inline-block;">
              <div class="card mx-4 card testimonial-card my-5">
                <div class="card-up aqua-gradient"></div>
                <div class="avatar mx-auto white">
                  <img src="user.jpg" class="card-img-top; rounded-circle img-fluid" alt="...">
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $row['firstname'] ?>&nbsp;&nbsp;<?php echo $row['lastname']; ?></h5>
                  <a href="final.php?id=<?= $row['id'] ?>" class="btn btn-primary">vote</a>


                </div>
              </div>

            </div>
      <?php
          }
        }
      }



      $conn->close();







      ?>