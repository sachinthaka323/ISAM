<?php

require_once '../../connection.php';


session_start();



if (!isset($_SESSION['user']) && !isset($_SESSION['login'])) {
    header("location:../../../index.php");
}





?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ISAMS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/card.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <h3><a href="../../index.php">ISAMS</a></h3>
            </div>

            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#batch" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Batch</a>
                    <ul class="collapse list-unstyled" id="batch">
                        <li>
                        <a href="../batch/dashboard.php">View batch</a>
                        </li>
                        <li>
                        <a href="../batch/batch_add.php">Add batch</a>
                        </li>
                        <li>
                        <a href="../batch/manage_batch.php">Manage batch</a>
                        </li>
                    </ul>
                </li>
            
                <li>
                    <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Student</a>
                    <ul class="collapse list-unstyled" id="student">
                        <li>
                            <a href="../student/student_Registration.php">Add student</a>
                        </li>
                        <li>
                            <a href="../student/dashboard.php">Manage student</a>
                        </li>
                      
                    </ul>
                </li>
                <li>
                    <a href="#event" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Event</a>
                    <ul class="collapse list-unstyled" id="event">
                        <li>
                        <a href="../event/dashboard.php">Add student</a>
                        </li>
                        <li>
                        <a href="../event/create_event.php">Manage student</a>
                        </li>
                   
                    </ul>
                </li>
             
                <li>
                    <a href="#vote" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Vote system</a>
                    <ul class="collapse list-unstyled" id="vote">
                       
                        <li>
                        <a href="../voting/form.php">Add cadidate</a>
                        </li>
                        <li>
                        <a href="../voting/result.php">View result</a>
                        </li>
                   
                    </ul>
                    <li>
                    
                        <a href="../../../logout.php" class="mt-4">Sign out</a>
                
                        </li>
                </li>
            </ul>

           
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    
                    
                </div>
            </nav>

     
       