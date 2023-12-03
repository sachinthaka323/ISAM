<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISAMS</title>
  <style>
    

  </style>
</head>

<body>



  <?php

  require_once '../include/votingdash.php';


  ?>

  <?php

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $_SESSION['vid'] = $id;




    $sql = "select users.firstname,users.lastname from users,candidate where users.id=candidate.user_id and candidate.voting_id='$id';";

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
            


            </div>
          </div>

        </div>


  <?php
      }
    }
  }




  require_once '../include/footer.php';






  ?>
</body>

</html>