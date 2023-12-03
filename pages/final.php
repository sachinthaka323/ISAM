<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="./css/pagec.css">

            <title>Document</title>
        </head>
        <body>



<?php
$conn = new mysqli("localhost", "root", "", "isams");

if ($conn->connect_error) {
    die($conn->connect_error);
}
session_start();



if (!isset($_SESSION['user']) && !isset($_SESSION['login'])) {
    header("location:../../../index.php");
}

// echo "thank you";

?>

  <?php
if (isset($_GET['id'])) {
    $user_id = $_SESSION['user'];
    $voting_id = $_SESSION['vid'];
    $id = $_GET['id'];
    
    $sql="insert into voting_result (candidate_id,student_id,voting_id) values ('$id','$user_id','$voting_id');";

    if($conn->query($sql)==TRUE){
        ?>
            <div class="thankyou-page">
                <div class="_header">
                    
                    <h1>Thank You <br> For <br> your participation.!</h1>
                </div>
                <div class="_body">
                    <div class="_box">
                        
                    </div>
                </div>
                <div class="_footer">
                    
                    <a class="btn" href="../index.php">Back to homepage</a>
                </div>
            </div>
            
        </body>
        </html>
        <?php
    }

}?>