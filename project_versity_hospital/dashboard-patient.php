<?php 
session_start();
include('inc/headerwithoutnav.php');
$_patient_id = $_SESSION['id']??0;
if(!$_patient_id){
    header('Location: index.php');
    die();
}
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/patient/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9">
			<div class="admin-header d-flex justify-content-between">
				<h2>Patient | Dashboard</h2>
				<ul class="d-flex">
					<li><i class="fa fa-user"></i></li>
					<li>Patient</li>
					<li>/</li>
					<li>Dashboard</li>
				</ul>
			</div>
			<div class="row">
				<?php include('inc/patient/dashboard.php'); ?>
			</div>
		</div>
    </div>
</div>
<?php include('inc/footer.php'); ?>