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
				<h2>PATIENT | Delete Your Appiontment</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-patient.php">PATIENT</a></li>
					<li>/</li>
					<li>Delete Appiontment</li>
				</ul>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 edit-doctor-specialization">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title text-center">Delete Your Appiontment</h5>
							</div>
							<div class="panel-body">
								<form class="edit-docotr-form" role="form" name="dcotorspcl" method="post" >
									<div class="form-group">
										<input type="text" name="appiontmentid" class="form-control"  placeholder="Enter Appiontment ID"  required="true">
									</div>
									<button id="editdoctorspecilization" type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
									<input type="hidden" name="action" value="patientdeleteappiontment">
								</form>
								<form action="patient-view-appointments.php" method="post" id="deleteform">
									<input type="hidden" name="action" value="patientdeleteappiontment">
									<input type="hidden" id="dtaskid" name="taskid">
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


