<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
include('inc/add-data.php');
// $doctorspecilization_id = $_SESSION['id']??0;
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
		<div class="col-lg-10 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>PATIENT | APPOINTMENT FORM</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-patient.php">PATIENT</a></li>
					<li>/</li>
					<li>APPOINTMENT FORM</li>
				</ul>
			</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 edit-doctor-specialization">
            <div class="panel panel-white">
                <div class="panel-heading">
                <h3 class="text-danger text-center">NOTE: Take Your Appointment Before 3Days </h3>
                <h5 class="panel-title text-center">Appointment Form</h5>
                </div>
                <div class="panel-body">
                    <form class="edit-docotr-form" role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                            <input type="text" name="appointmentdocotrid" class="form-control"  placeholder="Enter Doctor ID"  required="true">
                        </div>
                        <button id="editdoctorspecilization" type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                        <input type="hidden" name="action" value="addappointment">
                    </form>
                    <!-- <form action="admin-edit-doctor-manage.php" method="post" id="updateform">
                        <input type="hidden" name="action" value="dupdate">
                        <input type="hidden" id="utaskid" name="taskid">
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>








		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>