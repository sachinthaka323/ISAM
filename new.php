<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php
$conn=new mysqli("localhost","root","","isams");

if ($conn->connect_error){
    die($conn->connect_error);
}


// $sql="select CURDATE() as date,CURTIME() as time; ";

// $result=$conn->query($sql);

// if($result->num_rows>0){
//     $row=$result->fetch_assoc();
//     echo $row['date']."<br>";
//     echo $row['time'];
// }

date_default_timezone_set('Asia/colombo');
// $date = date('m/d/Y h:i a', time());
$tt = date("H:i"); 
echo $tt."<br>";
$today = date("Y-m-d");
echo $today;
if($today=="2023-01-06" && (strtotime($tt)>strtotime("20:04") &&strtotime("21:04")>strtotime($tt))){
   echo "hri";
}else{
    echo "waradi";
}

?>



</body>
</html>
