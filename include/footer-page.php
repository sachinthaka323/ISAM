
  <!--footer section-->
  <section id="footer-section" style="background:rgba(247, 247, 248, 0.856);">
  <div class="container">
    <footer class="py-5">
   

      <div class="row">
        <div class="col-6 col-lg-3 mb-4">
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted ">Home</a></li>
            <li class="nav-item mb-2"><a href="event.php" class="nav-link p-0 text-muted">Event</a></li>
            <li class="nav-item mb-2"><a href="about.php" class="nav-link p-0 text-muted">About</a></li>
            <li class="nav-item mb-2"><a href="social_work.php" class="nav-link p-0 text-muted">Social Work</a></li>
            <li class="nav-item mb-2"><a href="login.php" class="nav-link p-0 text-muted">Voting</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-4 mb-4">
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Help</a></li>
          </ul>

        </div>
        <div class="col-6 col-lg-4 mb-4">
          <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
            <h5>Subscribe to our newsletter</h5>
            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address" name="email">
             <input type="submit" value="submit" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>

      <?php
      $conn=new mysqli("localhost","root","","isams");

      if ($conn->connect_error){
          die($conn->connect_error);
      }
        if(isset($_POST['email'])) {
          $email = $_POST['email'];
          $insert = "INSERT INTO newsletter (Email) VALUES ('$email')";

          $conn -> query($insert);
        }
      ?>

      <div class="d-flex justify-content-between py-2 my-4 border-top">
        <!-- <p>&copy; 2022 All rights reserved.</p> -->
     
      </div>
    </footer>
  </div>
</section>

