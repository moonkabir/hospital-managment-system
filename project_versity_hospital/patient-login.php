<?php
include('inc/checklogin.php');
include('inc/header.php');
?>
<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 login-form-section">
				<h2 class="text-center"> HMSP | Patient Login</h2>
				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>Sign in to your account</legend>
							<p>Please enter your Email and password to log in.<br /></p>
							<div class="form-group">
								<span class="input-icon">
									<i class="fa fa-user"></i>
									<input type="text" class="form-control" name="email" placeholder="Email">
								</span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control password" name="password" placeholder="Password">
								</span>
								<a href="#">Forgot Password ?</a>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>
							</div>
							<div class="new-account">Don't have an account yet?
								<a href="patient-registration.php">Create an account</a>
							</div>
						</fieldset>
						<input type="hidden" name="action" id="action" value="pattientLogin">
					</form>
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMSP</span>. <span>All rights reserved</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	include('inc/footer.php');
?>