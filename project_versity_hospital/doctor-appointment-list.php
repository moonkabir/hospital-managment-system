<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
include('inc/add-data.php');
// $doctorspecilization_id = $_SESSION['id']??0;
$_doctor_id = $_SESSION['id']??0;
if(!$_doctor_id){
    header('Location: index.php');
    die();
}
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
	throw new Exception("Cannot connect to database");
}

$query = "SELECT * FROM `appointment` WHERE doctorId = $_doctor_id";
$result = mysqli_query($connection,$query);
?>

<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/doctor/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>DOCTOR | APPOINTMENT</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-doctor.php">DOCTOR</a></li>
					<li>/</li>
					<li>APPOINTMENT</li>
				</ul>
			</div>
            <?php include('inc/doctor/appointment-dashboard.php'); ?>
		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>