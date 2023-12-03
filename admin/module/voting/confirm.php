<?php
require_once '../include/headerpage.php';


if(isset($_POST['id'])||isset( $_SESSION['vid'])){
 
  $id=$_POST['id'];
 $_SESSION['cid']=$id;


  $sql = "select * from users where user_id='$id';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id']=$row['id'];
 

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

                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Candidate Registration Form </h3>

                <form method="post" action="registration.php">
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
require_once '../include/footer.php';
?>


  