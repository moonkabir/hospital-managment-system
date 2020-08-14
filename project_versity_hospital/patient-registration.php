<?php
include('inc/checkregestration.php');
include('inc/header.php');
?>
<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 registration-form-section">
				<div class="box-login">
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>Sign Up</legend>
							<p>Enter your personal details below:</p>
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
							<div class="d-flex">
								<div class="form-group col-6">
									<input type="text" class="form-control" name="address" placeholder="Address" required>
								</div>
								<div class="form-group col-6">
									<input type="text" class="form-control" name="city" placeholder="City" required>
								</div>
							</div>
							<div class="form-group d-flex justify-content-center ">
								<label class="block gender">Gender:</label>
								<div class="form-group">
									<span class="input-icon">
										<input type="text" class="form-control" name="gender" id="gender" placeholder="Gender(male/female)" required> 
									</span>
								</div>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="contact" id="contact" placeholder="Phone Number" required> 
								</span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
								</span>
							</div>
							<div class="d-flex">
								<div class="form-group col-8 offset-2">
									<span class="input-icon">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									</span>
								</div>
							</div>
							<div class="form-actions">
								<p>Already have an account?
									<a href="patient-login.php">Log-in</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">Submit</button>
							</div>
						</fieldset>
                        <input type="hidden" name="action" id="action" value="pattientRegister">
					</form>
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	include('inc/footer.php');
?>