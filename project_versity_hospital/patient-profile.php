<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
$_patient_id = $_SESSION['id']??0;
if(!$_patient_id){
    header('Location: index.php');
    die();
}
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
	throw new Exception("Cannot connect to database");
}
$query = "SELECT * FROM `patients` WHERE id = {$_patient_id}";
$result = mysqli_query($connection,$query);
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/patient/sidebar.php'); ?>		
		</div>
		<div class="col-lg-10 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>PATIENT | ACCOUNT</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-patient.php">PATIENT</a></li>
					<li>/</li>
					<li>ACCOUNT</li>
				</ul>
			</div>
            <?php include('inc/patient/profile-dashboard.php'); ?>
		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>