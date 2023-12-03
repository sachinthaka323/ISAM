<?php



require_once '../include/headerpage.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  echo $id;
  $sql = "update batch set active=0 where id=$id;";
  if ($conn->query($sql) === TRUE) {
    $sq = "update users set active=0 where batch_id=$id;";
    if ($conn->query($sq) == TRUE) {
?>
      <script>
        window.location = "manage_batch.php";
      </script>

<?php
    }
  } else {
    echo "error" . $conn->error;
  }
}


require_once '../include/footer.php';
?>