<?php

require_once '../include/headerpage.php';

if(isset($_POST['batch']) && isset($_POST['vname']) && isset($_POST['date'])&& isset($_POST['stime'])&& isset($_POST['etime']) ){
  $select=$_POST['batch'];
  $vname=$_POST['vname'];
  $date=$_POST['date'];
  $sti=$_POST['stime'];
  $eti=$_POST['etime'];

$sql="select * from batch where id='$select'";

$result=$conn->query($sql);

if($result->num_rows>0){
  $row=$result->fetch_assoc();

  $batch=$row['batch_name'];
 

  //insert the data to the voting create table
  $create="insert into voting_create (name,date,stime,etime,batch_id,batch_name) values('$vname','$date','$sti','$eti','$select','$batch')";

  if($conn->query($create)===TRUE){
        $success=1;
  }
  else{
    $erro=1;
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

            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Voting Create</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              
              <div class="row">
                <div class="col-md-12 mb-4">

                  <?php if(isset($success)){
                    ?>
                     <div class="alert alert-success text-center mt-3" role="alert">
                        successfull created....!    
                    </div>
              
                    <?php
                    }else{
                     
                        ?>
                     <!-- <div class="alert alert-danger text-center mt-3" role="alert">
                        Invalid data....!    
                    </div>
               -->
                    <?php
                      
                    }?>

                  <div class="form-outline">
                    <label class="form-label" for="firstName">voting name</label>
                    <input type="text" id="firstName" name="vname" class="form-control form-control-lg" />
                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">Start date</label>
                    <input type="date" id="firstName" name="date" class="form-control form-control-lg" />
                  </div>

                </div>

              </div>
              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName"> Start Time</label>
                    <input type="time" id="firstName" name="stime" class="form-control form-control-lg" />
                  </div>

                </div>

              </div>
              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">End Time</label>
                    <input type="time" id="firstName" name="etime" class="form-control form-control-lg" />
                  </div>

                </div>

              </div>
              

              <div>
                  Batch
                </div>
                <div class="row mt-3">
                  <div class="col-md-8">
                    <select class="form-select" aria-label="Default select example" name="batch">
                      <option value=''>SELECT</option>
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
<?php
require_once '../include/footer.php';

?>
</body>

</html>