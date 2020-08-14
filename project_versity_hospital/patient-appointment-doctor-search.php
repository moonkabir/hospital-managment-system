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
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
	throw new Exception("Cannot connect to database");
}
$search = $_POST['search']??'';
$query = "SELECT * FROM `doctor` WHERE `status`=1 AND `specialization` LIKE '{$search}%' ORDER BY `Id`";
$result = mysqli_query($connection,$query);
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/patient/sidebar.php'); ?>		
		</div>
		<div class="col-lg-10 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>PATIENT | ALL SEARCH RESULT LIST</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-patient.php">PATIENT</a></li>
					<li>/</li>
					<li>ALL SEARCH RESULT LIST</li>
				</ul>
            </div>
            <div class="container-fluid container-fullw bg-white doctor-specialization">
                <div class="row">
                    <div class="col-md-12 doctor-specialization-list">
                        <h5 class="text-center">All Search Result List</h5>


<?php if(mysqli_num_rows($result)==0){ ?>
<p class="not-found-search-result">No Search Result found</p>
<?php }else{ ?>
                        <form method="POST">
                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th class="center">ID</th>
                                        <th>Specialization</th>
                                        <th>Name</th>
                                        <th>Fees</th>
                                        <th>Schedule Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['Id'];?></td>
                                    <td><?php echo $data['specialization'];?></td>
                                    <td><?php echo $data['name'];?></td>
                                    <td><?php echo $data['fees'];?></td>
                                    <td><?php echo $data['scheduleTime'];?></td>
                                    <td>
                                        <a class="update" data-taskid="<?php echo $data['Id'];?>" href='#'>Appiontment</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    mysqli_close($connection);
                                ?>
                                </tbody>
                            </table>
                        </form>
<?php } ?>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>