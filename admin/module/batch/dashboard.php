<?php

require_once '../include/headerpage.php';

$sql = "select * from batch where active=1;";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
  $batch=$row['batch_name']
?><div class="card mt-3 mx-3" style="width: 18rem; display: inline-block;">

      <div class="card-body dash">
        <h5 class="card-title"><?php echo $row['batch_name']; ?></h5>
        <?php
        $sq = "select count(id) from users where role='student' and batch_name='$batch';";
        $re = $conn->query($sq);
        if ($re->num_rows > 0) {
          $ro = $re->fetch_assoc();
          $val = $ro["count(id)"]; ?>
          <h5 class="card-title">Total student:<?php echo $val; ?></h5>

          <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mt-3">view</a>
      </div>
    </div><?php
        }
      }
    }
  
    require_once '../include/footer.php';

   ?>
    