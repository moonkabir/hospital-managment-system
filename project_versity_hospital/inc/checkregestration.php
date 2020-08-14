<?php
include_once('config.php');
$action = $_POST['action'] ?? '';
$status = '';
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$connection) {
    throw new Exception( "Cannot connect to database" );
}else{
    if ( 'pattientRegister' == $action ) {
        $name = $_POST['name'] ?? '';
        $address = $_POST['address'] ?? '';
        $city = $_POST['city'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $contact = $_POST['contact'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ( $name && $address && $city && $gender && $contact && $email && $password ) {
            $hash = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO `patients`(`name`, `address`, `city`, `gender`, `contact`, `email`, `password`) VALUES ('{$name}','{$address}','{$city}','{$gender}','{$contact}','{$email}','{$hash}')";
            mysqli_query($connection,$query);
            if(mysqli_error($connection)){
                $status = "Incorrect Value";
            }else{
                $status = 'User created successfully';
            }
        }else{
            $status = 'Information missing';
        }
        header("Location: index.php?status={$status}");
    }else if('adddoctor' == $action){
        $adddoctorspecialization = $_POST['adddoctorspecialization'] ?? '';
        $adddoctorname = $_POST['adddoctorname'] ?? '';
        $adddoctoraddress = $_POST['adddoctoraddress'] ??'';
        $adddoctorfees = $_POST['adddoctorfees'] ?? '';
        $adddoctorscheduletime = $_POST['adddoctorscheduletime'] ?? '';
        $adddoctorcontact = $_POST['adddoctorcontact'] ?? '';
        $adddoctoremail = $_POST['adddoctoremail'] ?? '';
        $adddoctorpassword = $_POST['adddoctorpassword'] ?? '';
        // $_user_id = $_SESSION['id']??0;
        if($adddoctorspecialization && $adddoctorname && $adddoctoraddress && $adddoctorfees && $adddoctorscheduletime && $adddoctorcontact && $adddoctoremail && $adddoctorpassword){
            $hash = password_hash( $adddoctorpassword, PASSWORD_BCRYPT );
            $query = "INSERT INTO `doctor`(`specialization`, `name`, `address`, `fees`, `scheduleTime`, `contact`, `email`, `password`) VALUES ('{$adddoctorspecialization}','{$adddoctorname}','{$adddoctoraddress}','{$adddoctorfees}','{$adddoctorscheduletime}','{$adddoctorcontact}','{$adddoctoremail}','{$hash}')";
            mysqli_query($connection,$query);
            if(mysqli_error($connection)){
                $status = "Incorrect Value";
            }else{
                $status = 'User created successfully';
            }
        }else{
            $status = "Data missing";
        }
        header( "Location: admin-managedoctors.php?status={$status}" );
    }else if ( 'adminpattientRegister' == $action ) {
        $name = $_POST['name'] ?? '';
        $address = $_POST['address'] ?? '';
        $city = $_POST['city'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $contact = $_POST['contact'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ( $name && $address && $city && $gender && $contact && $email && $password ) {
            $hash = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO `patients`(`name`, `address`, `city`, `gender`, `contact`, `email`, `password`) VALUES ('{$name}','{$address}','{$city}','{$gender}','{$contact}','{$email}','{$hash}')";
            mysqli_query($connection,$query);
            if(mysqli_error($connection)){
                $status = "Incorrect Value";
            }else{
                $status = 'User created successfully';
            }
        }else{
            $status = 'Information missing';
        }
        header("Location: admin-managepatients.php?status={$status}");
    }

}


/*
debug
echo "<pre>Debug: $query</pre>\n";
$result = mysqli_query($connection, $query);
if ( false===$result ) {
    printf("error: %s\n", mysqli_error($connection));
}
else {
    echo 'done.';
}
die();
*/














?>