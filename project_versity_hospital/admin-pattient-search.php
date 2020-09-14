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
$query = "SELECT * FROM `patients` WHERE `email` LIKE '{$search}%' ORDER BY `email`";
$result = mysqli_query($connection,$query);
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/admin/sidebar.php'); ?>		
		</div>
		<div class="col-lg-10 doctor-specialization">
			<div class="admin-header d-flex justify-content-between">
				<h2>ADMIN | ALL SEARCH RESULT LIST</h2>
				<ul class="d-flex">
                    <li><a href="dashboard-admin.php">Admin</a></li>
					<li>/</li>
					<li>ALL SEARCH RESULT LIST</li>
				</ul>
            </div>
            <div class="container-fluid container-fullw bg-white doctor-specialization">
                <div class="row">
                    <div class="col-md-12 doctor-specialization-list">
                        <h5 class="text-center">All Search Result List</h5>
<?php if(!$result || mysqli_num_rows($result)==0){ ?>
<p class="not-found-search-result">No Search Result found</p>
<?php }else{ ?>
                        <form method="POST">
                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th class="center">ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th class="hidden-xs">Creation Date</th>
                                        <th class="hidden-xs">Update Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                
                                while ($data = mysqli_fetch_assoc($result)) {
                                    $ctimestamp = strtotime($data['creationDate']);
                                    $utimestamp = strtotime($data['updateDate']);
                                    $cdate = date("jS M, Y", $ctimestamp);
                                    $udate = date("jS M, Y", $utimestamp);
                                ?>
                                <tr>
                                    <td><?php echo $data['id'];?></td>
                                    <td><?php echo $data['name'];?></td>
                                    <td><?php echo $data['address'];?></td>
                                    <td><?php echo $data['city'];?></td>
                                    <td><?php echo $data['gender'];?></td>
                                    <td><?php echo $data['contact'];?></td>
                                    <td><?php echo $data['email'];?></td>
                                    <td><?php echo $cdate;?></td>
                                    <td><?php echo $udate;?></td>
                                    <td>
                                        <a class="delete" data-taskid="<?php echo $data['id'];?>" href='#'>Delete</a> | <a class="update"
                                                data-taskid="<?php echo $data['id'];?>" href='admin-edit-pattients-manage.php'>Update</a>
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
                        <form action="admin-managepattients.php" method="post" id="deleteform">
                            <input type="hidden" name="action" value="pdelete">
                            <input type="hidden" id="dtaskid" name="taskid">
                        </form>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
<?php include('inc/footerwithoutbg.php'); ?>
