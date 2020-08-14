<?php 
session_start();
include('inc/config.php');
include('inc/headerwithoutnavwithoutbg.php');
include('inc/add-data.php');
$_user_id = $_SESSION['id']??0;
if(!$_user_id){
    header('Location: index.php');
    die();
}
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/admin/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9">
			<div class="admin-header d-flex justify-content-between">
				<h2>ADMIN | EDIT PATIENT DETAILS</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-admin.php">Admin</a></li>
					<li>/</li>
					<li>EDIT PATIENT DETAILS</li>
				</ul>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 edit-doctor-specialization">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title text-center">Edit Patient Details</h5>
							</div>
							<div class="panel-body">
								<form class="edit-pattient-form" role="form" name="dcotorspcl" method="post" >
									<div class="form-group">
										<input type="text" name="editpattientid" class="form-control"  placeholder="Enter pattient ID"  required="true">
										<input type="text" name="editpattientname" class="form-control"  placeholder="Edit Pattient Name">
										<input type="text" name="editpattientaddress" class="form-control"  placeholder="Edit Pattient Address">
										<input type="text" name="editpattientcity" class="form-control"  placeholder="Edit Pattient City">
										<input type="text" name="editpattientcontact" class="form-control"  placeholder="Edit Pattient Contact">
									</div>
									<button id="editdoctorspecilization" type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
									<input type="hidden" name="action" value="editpattient">
								</form>
								<form action="admin-edit-pattients-manage.php" method="post" id="updateform">
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


