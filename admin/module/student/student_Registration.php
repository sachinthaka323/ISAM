<?php

use function PHPSTORM_META\elementType;

require_once '../include/headerpage.php';


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
  
      if ($conn->query($sql) === TRUE) {
        $to = "$mail";
        $subject = "Intergrated Student Activity Management System";
        $txt = "user name:.$user_id and password:.$user_id";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers = 'From:,<udithaindunil5@gmail.com>' . "\r\n";
  
  
        mail($to, $subject, $txt, $headers);
  
        $su=1;
      }
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

            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Student Registration Form </h3>
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


              <!--departmants-->
              <div>Departmant</div>


              <div class="row">
                <div class="col-md-3">


                  <div class="form-check mt-2" required>
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
                    <input class="form-check-input" type="radio" name="dept" value="IAT" id="flexRadioDefault2">
                    IAT
                  </div>
                </div>
              </div>
              
              <div>
                Batch
              </div>
              <div class="row mt-3">
                <div class="col-md-8">
                  <select class="form-select" name="select" aria-label="Default select example" required>
                    <option value=''>SELECT</option>
                    <?php

                    $sql = "select * from batch where active=1;";

                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='$row[id]'>$row[batch_name]</option>";
                    }

                    ?>
                  </select>

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