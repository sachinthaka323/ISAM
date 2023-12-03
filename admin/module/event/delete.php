<?php



require_once '../include/headerpage.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;
    $sql = "update even_create set active=0 where id=$id;";
    if ($conn->query($sql) === TRUE) {
       ?>
       <script>
        window.location="manageevent.php";
       </script>
       
       <?php
     
    } else{
      echo "error".$conn->error;
    }
}


require_once '../include/footer.php';
?>