<?php

require_once '../include/headerpage.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $_SESSION['uid'] = $id;
  //
  //user id and password

  $sql = "select * from users where id='$id';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //   $val = $row["count(id)"];
    //   $user_id = $val + 1;
    //   $user_id = "stu000" . $user_id;

    //   $pass = password_hash($user_id, PASSWORD_DEFAULT);

    //abc.php?id=<?php echo $id
?>
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5">

                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Student Registration Form </h3>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                  <div class="mb-3">Registered batch</div>
                  <div><?php echo $row['batch_name']; ?></div>

                  <div class="mt-3">
                    Edit Batch
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-8">
                      <select class="form-select" name="select" aria-label="Default select example">
                        </option>
                        <?php

                        $sql = "select * from batch;";

                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                          echo "<option value='$row[batch_name]'>$row[batch_name]</option>";
                        }

                        ?>

                      </select>

                    </div>
                  </div>

                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
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
}

if(isset($_POST['fname']) ||isset($_POST['fname'])||isset($_POST['lname'])||isset($_POST['phone'])||isset($_POST['mail'])||isset($_POST['bday'])||isset($_POST['gender'])||isset($_POST['dept'])||isset($_POST['dept'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $phone=$_POST['phone'];
  $mail=$_POST['mail'];
  $bday=$_POST['bday'];
  $gender=$_POST['gender'];
  $dept=$_POST['dept'];
  $select=$_POST['select'];
  
  $id=$_SESSION['uid'];
  // echo $fname."<br>";
  // echo $lname."<br>";
  // echo $phone."<br>";
  // echo $mail."<br>";
  // echo $bday."<br>";
  // echo $gender."<br>";
  // echo $dept."<br>";
  // echo $select."<br>";


  $sql="update users set firstname='$fname',lastname='$lname',phone_no='$phone',email='$mail',bday='$bday',gender='$gender',department='$dept',batch_name='$select' where id='$id';";
  if($conn->query($sql)==TRUE){
    ?>
    <script>
      alert("record successfull updated...!");
     window.location="dashboard.php";
    </script>
    
    <?php
  }else{
    echo "error".$conn->error;
  }
}
      




require_once '../include/footer.php';


              ?>