<?php

require_once './admin/connection.php';

session_start();
// date_default_timezone_set('Asia/colombo');
// $date = date('m/d/Y h:i:s a', time());

// echo $date;
$to="udithakumara2000@gmail.com";
$subject="html code";
$txt="hello";
$headers="MIME-Version: 1.0". "\r\n";
$headers="Content-type:text/html;charset=UTF-8"."\r\n";
$headers='From:,<udithaindunil5@gmail.com>'."\r\n";


mail($to,$subject,$txt,$headers);


?>