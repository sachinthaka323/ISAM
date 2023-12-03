<?php

require_once '../include/headerpage.php';

// if (isset($_POST['event']) && (isset($_POST['date'])) && (isset($_POST['des_1'])) && (isset($_POST['des_2'])) && (isset($_POST['permission'])) && (isset($_POST['special'])) && (isset($_POST['file']))) {
//   $event = $_POST['event'];
//   $date = $_POST['date'];
//   $des_1 = $_POST['des_1'];
//   $des_2 = $_POST['des_2'];
//   $permission = $_POST['permission'];
//   $special = $_POST['special'];

//   $sql = "insert into even_create (event_name,date,description_1,description_2,permission,special)
//       values ('$event','$date','$des_1','$des_2','$permission','$special');";

//   if ($conn->query($sql) === TRUE) {
//     $su = 1;
//   }
// } else {
//   if (isset($_POST['event']) && (isset($_POST['date'])) && (isset($_POST['des_1'])) && (isset($_POST['des_2'])) && (isset($_POST['permission']))) {
//     $event = $_POST['event'];
//     $date = $_POST['date'];
//     $des_1 = $_POST['des_1'];
//     $des_2 = $_POST['des_2'];
//     $permission = $_POST['permission'];
//     $special = "off";

//     $sql = "insert into even_create (event_name,date,description_1,permission,special)
//         values ('$event','$date','$des_1','$des_2','$permission','$special');";

//     if ($conn->query($sql) === TRUE) {
//       $su = 1;
//     }
//   }
//}
if(isset($_POST['submit'])&&isset($_POST['event']) && (isset($_POST['date'])) && (isset($_POST['des_1'])) && (isset($_POST['des_2'])) && (isset($_POST['permission'])) && (isset($_POST['special']))){
  //print_r($_FILES);

  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpname = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'pdf','png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      $fileNamenew = uniqid('', true) . "." . $fileActualExt;
      $fileDesti = 'upload/' . $fileNamenew;
      move_uploaded_file($fileTmpname, $fileDesti);

    }else{
      echo "error upload";
    }
}
     $event = $_POST['event'];
      $date = $_POST['date'];
      $des_1 = $_POST['des_1'];
      $des_2 = $_POST['des_2'];
      $permission = $_POST['permission'];
      $special = $_POST['special'];

      $sql = "insert into even_create (event_name,date,description_1,description_2,permission,special,upload,active)
          values ('$event','$date','$des_1','$des_2','$permission','$special','$fileDesti',1);";

      if ($conn->query($sql) === TRUE) {
        $su = 1;
      }

}else
if(isset($_POST['submit'])&&isset($_POST['event']) && (isset($_POST['date'])) && (isset($_POST['des_1'])) && (isset($_POST['des_2'])) && (isset($_POST['permission']))){
  //print_r($_FILES);

  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpname = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'pdf','png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      $fileNamenew = uniqid('', true) . "." . $fileActualExt;
      $fileDesti = 'upload/' . $fileNamenew;
      move_uploaded_file($fileTmpname, $fileDesti);

    }else{
      echo "error upload";
    }
}
     $event = $_POST['event'];
      $date = $_POST['date'];
      $des_1 = $_POST['des_1'];
      $des_2 = $_POST['des_2'];
      $permission = $_POST['permission'];
      $special = 'off';

      $sql = "insert into even_create (event_name,date,description_1,description_2,permission,special,upload,active)
          values ('$event','$date','$des_1','$des_2','$permission','$special','$fileDesti',1);";

      if ($conn->query($sql) === TRUE) {
        $su = 1;
      }

}



?>


<!-- Navbar Start -->

<section class="vh-100 gradient-custom">
  <div class="container new py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">

            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create a Event</h3>
            <?php if (isset($su)) {

            ?>
              <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your message has been sent successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php
            } ?>


            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="event">Event Name</label>
                    <input type="text" name="event" class="form-control form-control-lg" />
                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">Date</label>
                    <input type="date" name="date" class="form-control form-control-lg" />
                  </div>

                </div>

              </div>
              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description-1</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des_1"></textarea>
                  </div>

                </div>

              </div>
              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description-2</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des_2"></textarea>
                  </div>

                </div>

              </div>

              <div>
                permission
              </div>
              <div class="row mt-4">
                <div class="col-md-6 mb-4">


                  <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="permission" value="internal" id="flexRadioDefault2">
                    internal student
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="permission" value="both" id="flexRadioDefault2">
                    both internal and external student
                  </div>
                </div>
              </div>

              <!-- <div class="row">
                <div class="col-md-6 mb-5">
                  <div class="form-check ">
                    <input class="form-check-input" type="radio" name="permission" value="both" id="flexRadioDefault2">
                    both internal and external student
                  </div>
                </div> -->
              <!-- 
             <div class="row">
              <div class="col mt-5"> -->

              <div class="row mt-4">
                <div class="col-md-6 mb-4">
                  <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="special" id="flexRadioDefault2">
                    <b>Show as the special event</b>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Your choice</label>
                <input class="form-control" type="file" id="formFile" name="file">
              </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="submit"/>
              </div>
          </div>

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
</body>

</html>