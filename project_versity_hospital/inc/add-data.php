<?php
// session_start();
include_once( 'config.php' );
$action = $_POST['action'] ?? '';
$connection = mysqli_connect( DB_SERVER, DB_USER, DB_PASS, DB_NAME );
if (!$connection) {
    throw new Exception( "Cannot connect to database" );
}else {
    if('addspecialization'==$action){
        $doctorspecilization = $_REQUEST['doctorspecilization']??'';
        $_user_id = $_SESSION['id']??0;
        if($doctorspecilization && $_user_id){
            $query = "INSERT INTO `doctorspecialization`(`specialization`) VALUES ('{$doctorspecilization}')";
            // echo $query;
            mysqli_query($connection, $query);
        }
        header( 'Location: admin-doctorspecialization.php' );
    } else if ( 'sdelete' == $action ) {
        $taskid = $_POST['taskid'];
        if ( $taskid ) {
            $query = "DELETE FROM `doctorspecialization` WHERE id={$taskid} LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-doctorspecialization.php' );
    }else if ( 'editspecialization' == $action ) {
        $editdoctorspecilization = $_REQUEST['editdoctorspecilization']??'';
        $editdoctorspecilizationid = $_REQUEST['editdoctorspecilizationid']??'';
        if($editdoctorspecilization && $editdoctorspecilizationid){
            $query = "UPDATE `doctorspecialization` SET `specialization`='{$editdoctorspecilization}' WHERE `id`='{$editdoctorspecilizationid}' LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-doctorspecialization.php' );
    }else if ( 'ddelete' == $action ) {
        $taskid = $_POST['taskid'];
        if ( $taskid ) {
            $query = "DELETE FROM `doctor` WHERE id={$taskid} LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-managedoctors.php' );
    }else if ( 'pdelete' == $action ) {
        $taskid = $_POST['taskid'];
        if ( $taskid ) {
            $query = "DELETE FROM `patients` WHERE id={$taskid} LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-managepatients.php' );
    }else if ( 'editpattient' == $action ) {
        $editpattientid = $_POST['editpattientid']??'';
        $query = "SELECT * FROM `patients` where id = {$editpattientid}";
        $result = mysqli_query($connection,$query);
        while($data = mysqli_fetch_assoc($result)){
            if ($_POST['editpattientname']) {
                $editpattientname = $_POST['editpattientname'];
            }else{
                $editpattientname=$data['name'];
            }
            if ($_POST['editpattientaddress']) {
                $editpattientaddress = $_POST['editpattientaddress'];
            }else{
                $editpattientaddress=$data['address'];
            }
            if ($_POST['editpattientcity']) {
                $editpattientcity = $_POST['editpattientcity'];
            }else{
                $editpattientcity=$data['city'];
            }
            if ($_POST['editpattientcontact']) {
                $editpattientcontact = $_POST['editpattientcontact'];
            }else{
                $editpattientcontact=$data['contact'];
            }
        }
        $data = ($editpattientname && $editpattientaddress && $editpattientcity && $editpattientcontact);
        if($editpattientid && $data){
            $query = "UPDATE `patients` SET `name`='{$editpattientname}',`address`='{$editpattientaddress}',`city`='{$editpattientcity}',`contact`='{$editpattientcontact}' WHERE `id` = '{$editpattientid}' LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-managepatients.php' );
    }else if ( 'editpprofile' == $action ) {
        $_patient_id = $_SESSION['id'];
        $query = "SELECT * FROM `patients` where id = {$_patient_id}";
        $result = mysqli_query($connection,$query);
        while($data = mysqli_fetch_assoc($result)){
            if ($_POST['editpattientname']) {
                $editpattientname = $_POST['editpattientname'];
            }else{
                $editpattientname=$data['name'];
            }
            if ($_POST['editpattientaddress']) {
                $editpattientaddress = $_POST['editpattientaddress'];
            }else{
                $editpattientaddress=$data['address'];
            }
            if ($_POST['editpattientcity']) {
                $editpattientcity = $_POST['editpattientcity'];
            }else{
                $editpattientcity=$data['city'];
            }
            if ($_POST['editpattientcontact']) {
                $editpattientcontact = $_POST['editpattientcontact'];
            }else{
                $editpattientcontact=$data['contact'];
            }
        }
        $data = ($editpattientname && $editpattientaddress && $editpattientcity && $editpattientcontact);
        if($_patient_id && $data){
            $query = "UPDATE `patients` SET `name`='{$editpattientname}',`address`='{$editpattientaddress}',`city`='{$editpattientcity}',`contact`='{$editpattientcontact}' WHERE `id` = '{$_patient_id}' LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: patient-profile.php' );
    }else if ( 'editdoctor' == $action ) {
        $editdocotrid = $_POST['editdocotrid']??'';
        $query = "SELECT * FROM `doctor` where id = {$editdocotrid}";
        $result = mysqli_query($connection,$query);
        while($data = mysqli_fetch_assoc($result)){
            if ($_POST['editdocotrname']) {
                $editdocotrname = $_POST['editdocotrname'];
            }else{
                $editdocotrname=$data['name'];
            }
            if ($_POST['editdocotraddress']) {
                $editdocotraddress = $_POST['editdocotraddress'];
            }else{
                $editdocotraddress=$data['address'];
            }
            if ($_POST['editdocotrfees']) {
                $editdocotrfees = $_POST['editdocotrfees'];
            }else{
                $editdocotrfees=$data['fees'];
            }
            if ($_POST['editdocotrcontact']) {
                $editdocotrcontact = $_POST['editdocotrcontact'];
            }else{
                $editdocotrcontact=$data['contact'];
            }
        }
        $data = ($editdocotrname && $editdocotraddress && $editdocotrfees && $editdocotrcontact);
        if($editdocotrid && $data){
            $query = "UPDATE `doctor` SET `name`='{$editdocotrname}',`address`='{$editdocotraddress}',`fees`='{$editdocotrfees}',`contact`='{$editdocotrcontact}' WHERE `id` = '{$editdocotrid}' LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-managedoctors.php' );
    }else if('addappointment'==$action){
        $appointmentdocotrid = $_POST['appointmentdocotrid']??'';
        $dquery = "SELECT * FROM `doctor` where id = {$appointmentdocotrid}";
        $dresult = mysqli_query($connection,$dquery);
        while($ddata = mysqli_fetch_assoc($dresult)){
            $appdoctorname=$ddata['name'];
            $appdoctorfees=$ddata['fees'];
            $appdoctorspecialization=$ddata['specialization'];
        }
        $_patient_id = $_SESSION['id']??0;
        $pquery = "SELECT `name`, contact FROM `patients` where id = {$_patient_id}";
        $presult = mysqli_query($connection,$pquery);
        while($data = mysqli_fetch_assoc($presult)){
            $apppatientname=$data['name'];   
            $apppatientcontact=$data['contact'];   
        }
        $patient = ($_patient_id && $apppatientname && $apppatientcontact);
        if($appointmentdocotrid && $appdoctorname && $appdoctorfees && $appdoctorspecialization && $_patient_id && $apppatientname){
            $appointmentDate = strtotime("now")+(strtotime("+3days 6 hours")-strtotime("now"));
            $adate = date("jS M, Y", $appointmentDate);
            $query = "INSERT INTO `appointment`(`specialization`, `patientId`, `patientName`, `patientContact`, `doctorId`, `doctorName`, `consultancyFees`, `appointmentDate`) VALUES ('{$appdoctorspecialization}','{$_patient_id}','{$apppatientname}','{$apppatientcontact}','{$appointmentdocotrid}','{$appdoctorname}','{$appdoctorfees}','{$adate}')";
            mysqli_query($connection, $query);
        }
        header( 'Location: patient-view-appointments.php' );
    }else if('admin-addappointment'==$action){
        $appointmentdocotrid = $_POST['appointmentdocotrid']??'';
        $dquery = "SELECT * FROM `doctor` where id = {$appointmentdocotrid}";
        $dresult = mysqli_query($connection,$dquery);
        while($ddata = mysqli_fetch_assoc($dresult)){
            $appdoctorname=$ddata['name'];
            $appdoctorfees=$ddata['fees'];
            $appdoctorspecialization=$ddata['specialization'];
        }
        $appointmentpatientid = $_POST['appointmentpatientid']??'';
        $pquery = "SELECT `name`, contact FROM `patients` where id = {$appointmentpatientid}";
        $presult = mysqli_query($connection,$pquery);
        while($data = mysqli_fetch_assoc($presult)){
            $apppatientname=$data['name'];   
            $apppatientcontact=$data['contact'];   
        }
        $patient = ($appointmentpatientid && $apppatientname && $apppatientcontact);
        if($appointmentdocotrid && $appdoctorname && $appdoctorfees && $appdoctorspecialization && $appointmentpatientid && $apppatientname){
            $appointmentDate = strtotime("now")+(strtotime("+3days 6 hours")-strtotime("now"));
            $adate = date("jS M, Y", $appointmentDate);
            $query = "INSERT INTO `appointment`(`specialization`, `patientId`, `patientName`, `patientContact`, `doctorId`, `doctorName`, `consultancyFees`, `appointmentDate`) VALUES ('{$appdoctorspecialization}','{$appointmentpatientid}','{$apppatientname}','{$apppatientcontact}','{$appointmentdocotrid}','{$appdoctorname}','{$appdoctorfees}','{$adate}')";
            mysqli_query($connection, $query);
        }
        header( 'Location: admin-manageappointments.php' );
    }else if ( 'adminadelete' == $action ) {
        $taskid = $_POST['taskid'];
        if ( $taskid ) {
            $query = "DELETE FROM `appointment` WHERE id={$taskid} LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: admin-manageappointments.php' );
    }else if ( 'selfeditdoctor' == $action ) {
        $_doctor_id = $_SESSION['id'];
        $query = "SELECT * FROM `doctor` where id = {$_doctor_id}";
        $result = mysqli_query($connection,$query);
        while($data = mysqli_fetch_assoc($result)){
            if ($_POST['editdocotrname']) {
                $editdocotrname = $_POST['editdocotrname'];
            }else{
                $editdocotrname=$data['name'];
            }
            if ($_POST['editdocotraddress']) {
                $editdocotraddress = $_POST['editdocotraddress'];
            }else{
                $editdocotraddress=$data['address'];
            }
            if ($_POST['editdocotrfees']) {
                $editdocotrfees = $_POST['editdocotrfees'];
            }else{
                $editdocotrfees=$data['fees'];
            }
            if ($_POST['editdocotrcontact']) {
                $editdocotrcontact = $_POST['editdocotrcontact'];
            }else{
                $editdocotrcontact=$data['contact'];
            }
            if ($_POST['editdoctorpassword']) {
                $password = $_POST['editdoctorpassword'];
                $hash = password_hash( $password, PASSWORD_BCRYPT );
            }else{
                $hash = $data['password'];
            }
        }
        $data = ($editdocotrname && $editdocotraddress && $editdocotrfees && $editdocotrcontact && $hash);
        if($_doctor_id && $data){
            $query = "UPDATE `doctor` SET `name`='{$editdocotrname}',`address`='{$editdocotraddress}',`fees`='{$editdocotrfees}',`password`='{$hash}',`contact`='{$editdocotrcontact}' WHERE `id` = '{$_doctor_id}' LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: doctor-profile.php' );
    } else if ( 'patientdeleteappiontment' == $action ) {
        $appiontmentid = $_POST['appiontmentid'];
        $_patient_id=$_SESSION['id'];
        // echo $_patient_id;
        // die();
        if ( $appiontmentid && $_patient_id ) {
            $query = "DELETE FROM `appointment` WHERE id={$appiontmentid} AND patientId={$_patient_id} LIMIT 1";
            mysqli_query( $connection, $query );
        }
        header( 'Location: patient-view-appointments.php' );
    }
}






// else if ( 'doctorspecialization' == $action ) {
//     $doctorspecialization = $_POST['doctorspecialization']??0;
//     echo $doctorspecialization;
//     // die();
//     if ( $doctorspecialization ) {
//         $query = "SELECT * FROM `doctor` WHERE `specialization` LIKE '{$doctorspecialization}' ORDER BY `id`";
//         $apdlresult = mysqli_query($connection,$query);
//     }
//     header( 'Location: patient-new-appointment-doctor-list.php' );
// }






// ------pattient search--------
// if (!$connection) {
//     throw new Exception( "Cannot connect to database" );
// }else{
//     function getWords($user_id, $search=null){
//         global $connection;
//         if($search){
//             $query = "SELECT * FROM `patients` WHERE `email` LIKE '{$search}%' ORDER BY `email`";
//             // % er mane ja khuchi thakte pare
//             // {$search}% ai mane jei word ta dice seita first e thaketi hobe
//             // %{$search}% ai mane jei word ta dice seita jekono jaygay thakli hobe
//             // %{$search} ai mane jei word ta dice seita last e thaketi hobe
//         }
//         $result = mysqli_query($connection, $query);
//         $data = [];
//         while($_data = mysqli_fetch_assoc($result)){
//             array_push($data, $_data);
//         }
//         return $data;
//     }
// }





// echo "<pre>Debug: $query</pre>\n";
// $result = mysqli_query($connection, $query);
// if ( false===$result ) {
//     printf("error: %s\n", mysqli_error($connection));
// }
// else {
//     echo 'done.';
// }
// die();