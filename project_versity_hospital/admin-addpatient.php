<?php 
session_start();
include('inc/checkregestration.php');
include('inc/headerwithoutnavwithoutbg.php');

$_user_id = $_SESSION['id']??0;
if(!$_user_id){
    header('Location: index.php');
    die();
}
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
	throw new Exception("Cannot connect to database");
}
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/admin/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>ADMIN | ADD PATIENT</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-admin.php">Admin</a></li>
					<li>/</li>
					<li>ADD PATIENT</li>
				</ul>
			</div>
            <?php include('inc/admin/add-patient-dashboard.php'); ?>
		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>