<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnav.php');
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
// $query = "SELECT * FROM `doctorspecialization`";
// $result = mysqli_query($connection,$query);
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/admin/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9">
			<div class="admin-header d-flex justify-content-between">
				<h2>ADMIN | EDIT DOCTOR SPECIALIZATION</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-admin.php">Admin</a></li>
					<li>/</li>
					<li>EDIT DOCTOR SPECIALIZATION</li>
				</ul>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 edit-doctor-specialization">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title">Edit Doctor Specialization</h5>
							</div>
							<div class="panel-body">
								<p style="color:red;"></p>	
								<form role="form" name="dcotorspcl" method="post" >
									<div class="form-group">
										<input type="text" name="editdoctorspecilizationid" class="form-control"  placeholder="Enter Doctor Specialization ID">
										<input type="text" name="editdoctorspecilization" class="form-control"  placeholder="Enter Doctor Specialization">
									</div>
									<button id="editdoctorspecilization" type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
									<input type="hidden" name="action" value="editspecialization">
								</form>
								<form action="admin-doctorspecialization.php" method="post" id="updateform">
									<input type="hidden" name="action" value="update">
									<input type="hidden" id="utaskid" name="taskid">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>	
</div>
<?php include('inc/footer.php'); ?>


