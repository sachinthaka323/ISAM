<?php

require_once '../include/headerpage.php';
// require_once '../include/connection.php';
date_default_timezone_set('Asia/colombo');
$date = date('m/d/Y h:i:s a', time());



if (isset($_POST['year'])) {

  $year = $_POST['year'];

  $sql = "insert into batch (batch_name,create_date,active) values('$year','$date',1)";

  if ($conn->query($sql) === TRUE) {
    $count = 1;
  }
}

?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Batch Registration Form </h3>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">Intake year</label>
                    <input type="text" id="firstName" name="year" class="form-control form-control-lg">
                    <?php
                    if (isset($count)) {
                    ?>
                      <div class="alert alert-success text-center mt-3" role="alert">
                        successfull created....!    
                    </div> <?php
                          }

                            ?>
                  </div>

                </div>

              </div>



              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Create" />
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