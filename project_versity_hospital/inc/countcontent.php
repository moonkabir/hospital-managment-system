<?php
include_once('config.php');
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$connection) {
    throw new Exception( "Cannot connect to database" );
}else{
    $queryPatients = "SELECT * FROM `patients`";
    $resultPatients = mysqli_query($connection,$queryPatients);
    $totalPatients = mysqli_num_rows($resultPatients);
    
    $queryDoctor = "SELECT * FROM `doctor`";
    $resultDoctor = mysqli_query($connection,$queryDoctor);
    $totalDoctor = mysqli_num_rows($resultDoctor);

    $queryAppointment = "SELECT * FROM `appointment`";
    $resultAppointment = mysqli_query($connection,$queryAppointment);
    $totalAppointment = mysqli_num_rows($resultAppointment);
}