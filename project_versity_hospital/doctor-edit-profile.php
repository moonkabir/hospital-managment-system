<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
include('inc/add-data.php');
$_doctor_id = $_SESSION['id']??0;
if(!$_doctor_id){
    header('Location: index.php');
    die();
}
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/doctor/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9">
			<div class="admin-header d-flex justify-content-between">
				<h2>DOCTOR | EDIT DOCTOR DETAILS</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-doctor.php">DOCTOR</a></li>
					<li>/</li>
					<li>EDIT DOCTOR DETAILS</li>
				</ul>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 edit-doctor-specialization">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title text-center">Edit DOCTOR Details</h5>
							</div>
							<div class="panel-body">
								<form class="edit-docotr-form" role="form" name="dcotorspcl" method="post" >
									<div class="form-group">
										<input type="text" name="editdocotrname" class="form-control"  placeholder="Edit Doctor Name">
										<input type="text" name="editdocotraddress" class="form-control"  placeholder="Edit Doctor Address">
										<input type="text" name="editdocotrfees" class="form-control"  placeholder="Edit Doctor Fees">
										<input type="text" name="editdocotrcontact" class="form-control"  placeholder="Edit Doctor Contact">
										<input type="text" name="editdoctorpassword" class="form-control"  placeholder="Edit Doctor Password">
									</div>
									<button id="editdoctorspecilization" type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
									<input type="hidden" name="action" value="selfeditdoctor">
								</form>
								<form action="admin-edit-doctor-manage.php" method="post" id="updateform">
									<input type="hidden" name="action" value="dupdate">
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
<?php include('inc/footerwithoutbg.php'); ?>


