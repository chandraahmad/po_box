<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="<?= base_url() ?>"><b>Registration</b></a>
		</div>

		<div class="card">
			<div class="card-body register-card-body">
				<p class="login-box-msg">Register a new membership</p>
				<form id="insert_registration" method="post" enctype="multipart/form-data">
					<div class="input-group mb-3">
						<input type="text" name="user_name" class="form-control" placeholder="Full name" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="email" name="user_email" class="form-control" placeholder="Email" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="user_password1" class="form-control" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="user_password2" class="form-control" placeholder="Retype password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
								<label for="agreeTerms">
									I agree to the <a href="#">terms</a>
								</label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						</div>
					</div>
				</form>
				<a href="<?= base_url('Login') ?>" class="text-center">I already have a membership</a>
			</div>
		</div>
	</div>
</body>