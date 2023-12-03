<?php

require_once './admin/connection.php';

session_start();

if(isset($_SESSION['user']) && isset($_SESSION['login'])){
    session_destroy();

    header("location:index.php");
}

?>
