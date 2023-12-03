<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISAMS</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  
</body>
</html>

<?php
require_once '../include/headerpage.php';

if(isset($_SESSION['vid']) && isset($_SESSION['cid'])&& isset($_SESSION['user_id'])){
    $cid=$_SESSION['cid'];
    $vid=$_SESSION['vid'];
    $user_id=$_SESSION['user_id'];




   $sql="insert into candidate (student_id,user_id,voting_id) values ('$cid','$user_id','$vid');";
   if ($conn->query($sql) === TRUE) {
   ?> <script>
   Swal.fire(
     'Registration Success!',
     'success'
   ).then((result) => {
   if (result.isConfirmed) {
     window.location = "dashboard.php";
   }
 })
//       </script><?php
  }

}

require_once '../include/footer.php';
?>