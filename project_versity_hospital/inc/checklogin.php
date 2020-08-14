<?php
session_start();
include_once('config.php');
$action = $_POST['action'] ?? '';
$status = '';
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$connection) {
    throw new Exception( "Cannot connect to database" );
}else{
    if ('adminLogin' == $action) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ( $username && $password ) {
            $query = "SELECT id,PASSWORD FROM `admin` WHERE username='{$username}'";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['PASSWORD'];
                $_id = $data['id'];
                if (password_verify($password, $_password)) {
                    $_SESSION['id'] = $_id;
                    header("Location: dashboard-admin.php");
                    die();
                }else{
                    $status = "Username and password didn\'t match";
                }
            }else{
                $status = 'Username doesn\'t exist';
            }
        }else{
            $status = 'Username or Password Empty';
        }
        header("Location: index.php?status={$status}");
    }elseif('pattientLogin' == $action){
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ( $email && $password ) {
            $query = "SELECT id, PASSWORD FROM `patients` WHERE email='{$email}'";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['PASSWORD'];
                $_pid = $data['id'];
                if (password_verify($password, $_password)) {
                    $_SESSION['id'] = $_pid;
                    header("Location: dashboard-patient.php");
                    die();
                }
                else{
                    $status = "Username and password didn\'t match";
                }
            }else{
                $status = 'Username doesn\'t exist';
            }
        }else{
            $status = 'Username or Password Empty';
        }
        header("Location: index.php?status={$status}");
    }elseif('doctorLogin' == $action){
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ( $email && $password ) {
            $query = "SELECT id, PASSWORD FROM `doctor` WHERE email='{$email}'";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['PASSWORD'];
                $_did = $data['id'];
                if (password_verify($password, $_password)) {
                    $_SESSION['id'] = $_did;
                    header("Location: dashboard-doctor.php");
                    die();
                }else{
                    $status = "Username and password didn\'t match";
                }
            }else{
                $status = 'Username doesn\'t exist';
            }
        }else{
            $status = 'Username or Password Empty';
        }
        header("Location: index.php?status={$status}");
    }
}







// echo "<pre>Debug: $query</pre>\n";
// $result = mysqli_query($connection, $query);
// if ( false===$result ) {
//     printf("error: %s\n", mysqli_error($connection));
// }
// else {
//     echo 'done.';
// }
// die();
















?>