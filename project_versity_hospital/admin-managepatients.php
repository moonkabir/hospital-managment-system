<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
include('inc/add-data.php');
// $doctorspecilization_id = $_SESSION['id']??0;
$_user_id = $_SESSION['id']??0;
if(!$_user_id){
    header('Location: index.php');
    die();
}
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
	throw new Exception("Cannot connect to database");
}
$search = $_POST['search']??'';

$query = "SELECT * FROM `patients` WHERE `email` LIKE '{$search}%' ORDER BY `id`";
$result = mysqli_query($connection,$query);
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/admin/sidebar.php'); ?>		
		</div>
		<div class="col-lg-10 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>ADMIN | ALL PATTIENTS LIST</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-admin.php">Admin</a></li>
					<li>/</li>
					<li>ALL PATTIENTS LIST</li>
				</ul>
			</div>
            <?php include('inc/admin/manage-patients-dashboard.php'); ?>
		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>