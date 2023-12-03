<?php



require_once '../include/headerpage.php';

if(isset($_GET['id'])){
   $id=$_GET['id'];
   $sql="select special from even_create where id='$id';";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    $row=$result->fetch_assoc();
    if($row['special']=="off"){
        $sql="update even_create set special='on' where id='$id';";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
             window.location="manageevent.php";
            </script>     
            <?php
    }
   }
   else{
    $sql="update even_create set special='off' where id='$id';";
    if ($conn->query($sql) === TRUE) {
        ?>
        <script>
         window.location="manageevent.php";
        </script>     
        <?php
}
   }
   
   }


}


require_once '../include/footer.php';
?>