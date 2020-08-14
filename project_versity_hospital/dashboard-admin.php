<?php 
session_start();
include('inc/headerwithoutnav.php');
include('inc/countcontent.php');
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
				<h2> Admin | Dashboard</h2>
				<ul class="d-flex">
					<li><i class="fa fa-user"></i></li>
					<li>Admin</li>
					<li>/</li>
					<li>Dashboard</li>
				</ul>
			</div>
			<div class="row">
				<?php include('inc/admin/dashboard.php'); ?>
			</div>
		</div>
    </div>
</div>
<?php include('inc/footer.php'); ?>