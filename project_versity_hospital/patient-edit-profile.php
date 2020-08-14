<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
include('inc/add-data.php');
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
				<h2>PATIENT | EDIT PROFILE</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-patient.php">PATIENT</a></li>
					<li>/</li>
					<li>EDIT PROFILE</li>
				</ul>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 edit-doctor-specialization">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title text-center">Edit Profile</h5>
							</div>
							<div class="panel-body">
								<form class="edit-pattient-form" role="form" name="dcotorspcl" method="post" >
									<div class="form-group">
										<input type="text" name="editpattientname" class="form-control"  placeholder="Edit Your Name">
										<input type="text" name="editpattientaddress" class="form-control"  placeholder="Edit Your Address">
										<input type="text" name="editpattientcity" class="form-control"  placeholder="Edit Your City">
										<input type="text" name="editpattientcontact" class="form-control"  placeholder="Edit Your Contact">
										<input type="text" name="editpattientpassword" class="form-control"  placeholder="Edit Your Password">
									</div>
									<button id="editdoctorspecilization" type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
									<input type="hidden" name="action" value="editpprofile">
								</form>
								<form action="patient-profile.php" method="post" id="updateform">
									<input type="hidden" name="action" value="pupdate">
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


